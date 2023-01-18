<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\PreviousMedicationResource;
use App\Http\Resources\API\V1\Physician\ViewMedicationsResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use App\Models\Physician;
use App\Models\Prescription;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ViewMedicationsController extends Controller
{
    protected $physician;
    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'drugActive',
            'previusMedication',
        ]);
        // $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->physician = empty(auth()->id()) ? NULL : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function drugActive($id)
    {
        try {
          /*   $cita = MedicalAppointment::where('patient_id', $id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($cita < 1) {
                return response()->json(['Petición incorrecta']);
            } */
            $medicalhistory = $this->medicalhistory($id);
            $drug_active = $medicalhistory->nonpathologicalbackground;   
            
                return (new ViewMedicationsResource($drug_active))->additional(['message' => 'Informacion de Medicacion.']);
        } catch (\Throwable $th) {
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function previousMedication($id)
    {
        try {
            /* $cita = MedicalAppointment::where('patient_id', $id)
                ->where('physician_id', $this->physician->id)
                ->count();

            if ($cita < 1) {
                return response()->json(['Petición incorrecta']);
            } */
            $medicalhistory = $this->medicalhistory($id);
            $previus_medication  = $medicalhistory->nonpathologicalbackground;
            
                return (new PreviousMedicationResource($previus_medication))->additional(['message' => 'Informacion de Medicacion.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function medicalhistory($medical_history_id)
    {
        try {
            $medical_history = MedicalHistory::where('id', $medical_history_id)->first();

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
