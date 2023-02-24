<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\PreviousMedicationResource;
use App\Http\Resources\API\V1\Physician\ViewMedicationsResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;

class ViewMedicationsController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'drugActive',
            'previusMedication',
        ]);
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
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
    public function medicationPatient($patient_id){
        try {
            $medicalHistory = $this->medicalhistory($patient_id);
            if (! $medicalHistory) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }
            $previus_medication = $medicalHistory->nonpathologicalbackground;

            return (new ViewMedicationsResource($previus_medication))->additional(['message' => 'Informacion de Medicacion.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
