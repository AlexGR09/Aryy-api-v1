<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PerinatalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\PerinatalBackgroundResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\PerinatalBackground;
use App\Models\Physician;
use Illuminate\Support\Facades\DB;

class PerinatalBackgroundController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'store',
            'previusMedication',
        ]);
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function store(PerinatalBackgroundRequest $request, $patient_id)
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
            $medicalHistory = $this->medicalhistory($patient_id);
            if (!$medicalHistory || $medicalHistory->perinatalBackground) {
                return response()->json(['message' => 'No se encontro el historial de antecendentes perinatales'], 404);
            }
            $perinatalBackground = PerinatalBackground::create($request->validated());
            $medicalHistory->perinatal_background_id = $perinatalBackground->id;
            $medicalHistory->save();
            DB::commit();

            return (new PerinatalBackgroundResource($perinatalBackground))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function show($patient_id)
    {
        try {
            $medicalHistory = $this->medicalhistory($patient_id);
            $perinatalBackground = $medicalHistory->perinatalBackground;
            if (!$perinatalBackground) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }

            return (new PerinatalBackgroundResource($perinatalBackground))->additional(['message' => 'Informacion encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function update(PerinatalBackgroundRequest $request, $patient_id)
    {
        try {
            $medical_history = $this->medicalHistory($patient_id);

            if (! $medical_history || ! $medical_history->perinatalBackground) {
                return response()->json(['message' => 'Historial médico no existe o registro perinatal no existe'], 404);
            }

            $perinatalBackground = $medical_history->perinatalBackground;

            $perinatalBackground->update($request->validated());

            return (new perinatalBackgroundResource($perinatalBackground))
                ->additional(['message' => 'Antecedente perinatalo actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    // SE ASEGURA QUE EL MÉDICO PUEDA VER INFORMACIÓN SÓLO DEL PACIENTE QUE HA ATENDIDO
    public function medicalHistory($patient_id)
    {
        try {
            $medical_history = MedicalHistory::where('patient_id', $patient_id)->first();

            if ($medical_history) {
                $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
                    ->where('physician_id', $this->physician->id)
                    ->count();

                if ($medical_appointments > 0) {
                    return $medical_history;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}