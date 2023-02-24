<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\GynecologicalHistoryRequest;
use App\Http\Resources\API\V1\Physician\GynecologicalHistoryResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\ObgynBackground;
use App\Models\Physician;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class GynecologicalHistoryController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'store',
            'show',
            'update',
        ]);
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function store(GynecologicalHistoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $todaydatetime = date('Y-m-d');

            /* $medicalAppointment = MedicalAppointment::where('patient_id', $request->patient_id)
            ->where('physician_id', $this->physician->id)
            ->first();
            //se compara la fecha actual con la fecha de la cita
            if ($medicalAppointment->appointment_date != $todaydatetime) {
            return "Petición incorrecta";
            } */
            $medicalHistory = $this->medicalhistory($request->patient_id);
            if (!$medicalHistory || $medicalHistory->gynecological_history_id) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }
            $gynecologicalHistory = ObgynBackground::create($request->validated());
            $medicalHistory->gynecological_history_id = $gynecologicalHistory->id;
            $medicalHistory->save();
            DB::commit();

            return (new GynecologicalHistoryResource($gynecologicalHistory))->additional(['message' => 'Informacion de antecedentes ginecologicos guardado con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function show($patient_id)
    {
        try {
            $medicalHistory = $this->medicalhistory($patient_id);
            $gynecologicalHistory = ObgynBackground::where('id', $medicalHistory->gynecological_history_id)
                ->first();
            if (!$gynecologicalHistory) {
                return response()->json(['message' => 'No se encontro el historial ginecologico'], 404);
            }

            return (new GynecologicalHistoryResource($gynecologicalHistory))->additional(['message' => 'Informacion encontrada.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function update(GynecologicalHistoryRequest $request, $patient_id)
    {
        try {
            DB::beginTransaction();
            $medicalHistory = $this->medicalhistory($patient_id);
            $gynecologicalHistory = ObgynBackground::where('id', $medicalHistory->gynecological_history_id)->first();
            $gynecologicalHistory->update($request->validated());
            $gynecologicalHistory->save();
            DB::commit();

            return (new GynecologicalHistoryResource($gynecologicalHistory))->additional(['message' => 'Informacion actualizada.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function medicalhistory($patient_id)
    {
        try {
            $medical_history = MedicalHistory::where('patient_id', $patient_id)->first();
            if ($medical_history) {
                $medical_appointments = MedicalAppointment::where([['patient_id', $medical_history->patient_id], ['physician_id', $this->physician->id]])->count();
                if ($medical_appointments > 0) {
                    return $medical_history;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}