<?php

namespace App\Http\Controllers\API\V2\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V2\Patient\PatientStoreRequest;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = empty(auth()->id()) ? null : User::findOrFail(auth()->id());
        $this->middleware('permission:create patient profiles')->only(['store']);
    }

    public function store(PatientStoreRequest $request)
    {
        try {
            if (count($this->user->patients) > 4) {
                return response()->json(['messaage' => 'No puedes agregar más pacientes'], 503);
            }

            DB::beginTransaction();

            $patient = $this->user->patients()->create($request->validated());

            $patient->occupations()->attach($request->occupation_id);

            // CREA EL DIRECTORIO CORRESPONDIENTE DEL PACIENTE EN LA CARPETA DEL USUARIO
            $patient_folder = $patient->id.'_'.substr(sha1(time()), 0, 8);
            Storage::makeDirectory('users//patients//'.$this->user->user_folder.'//'.$patient_folder);

            $patient->update([
                'patient_folder' => $patient_folder,
            ]);

            $this->user->syncRoles(['User', 'Patient']);

            $patient->medical_history()->create(['patient_id' => $patient->id]);

            DB::commit();

            return (new PatientResource($patient))->additional(['message' => 'Perfil de paciente creado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
