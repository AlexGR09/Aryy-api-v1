<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PatientRequest;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function store(PatientRequest $request)
    {
        try {
            if ($this->user->hasRole('NewPatient')) {
                DB::beginTransaction();
                $patient = new Patient();
                $patient->user_id = $this->user->id;
                $patient->address = json_encode($request->address);
                $patient->zip_code = $request->zip_code;
                $patient->emergency_number = $request->emergency_number;
                $patient->city_id = $request->city_id;
                $patient->id_card = json_encode($request->id_card);
                $patient->save();
                $this->user->syncRoles(['User', 'Patient']);
                DB::commit();
                return (new PatientResource($patient))->additional(['message' => 'Perfil de paciente creado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            if ($this->user->hasPermissionTo('show patient')) {
                $patient = Patient::where('user_id', $this->user->id)->get();
                return (PatientResource::collection($patient))->additional(['message' => 'Mi perfil de paciente.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PatientRequest $request)
    {

        /* return response()->json("FUNCIONALIDAD EN CREACIÓN"); */
         try {
             if ($this->user->hasPermissionTo('edit patient')) {
                
                DB::beginTransaction();

                 $patient = Patient::where('user_id',$this->user->id)->first();
                 
                 $patient->address = json_encode($request->address);
                 $patient->zip_code = $request->zip_code;
                 $patient->emergency_number = $request->emergency_number;
                 $patient->city_id = $request->city_id;
                 $patient->code_country = $request->code_country;
                 $patient->id_card = json_encode($request->id_card);

                 $patient->save();

                 DB::commit();
                 return (new PatientResource($patient))->additional(['message' => 'paciente actualizado con éxito.']);
             }
             return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
         } catch (\Throwable $th) {
             DB::rollBack();
             return response()->json(['error' => $th->getMessage()], 503);
         }
    }


}
