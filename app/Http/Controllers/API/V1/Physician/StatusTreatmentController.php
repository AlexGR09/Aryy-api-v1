<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusTreatmentController extends Controller
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

    public function update(Request $request, $medical_history_id)
    {
        try {
            DB::beginTransaction();
            $medicalHistory = $this->medicalhistory($medical_history_id);
            $cita = MedicalAppointment::where([['patient_id', $medicalHistory->patient_id], ['physician_id', $this->physician->id]])->count();
            if ($cita < 1) {
                return response()->json(['Petición incorrecta']);
            }
            $drug_active = $medicalHistory->nonpathologicalbackground;
            if ($drug_active->previous_medication == null) {
                $drug_active->previous_medication = $drug_active->drug_active;
                $drug_active->drug_active = null;
                $drug_active->save();

                return response()->json(['Trataniento Completado', $request->drug_active]);
            }
            $new_medicine = $drug_active->previous_medication.','.$drug_active->drug_active;
            $drug_active->previous_medication = $new_medicine;
            $drug_active->drug_active = null;
            $drug_active->save();
            DB::commit();

            return response()->json(['Trataniento Completado']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function medicalhistory($medical_history_id)
    {
        try {
            $medical_history = MedicalHistory::where('id', $medical_history_id)->first();
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
