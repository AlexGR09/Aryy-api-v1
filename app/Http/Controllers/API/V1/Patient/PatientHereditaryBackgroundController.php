<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\UpdatePatientHereditaryBackgroundRequest;
use App\Models\HereditaryBackground;
use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientHereditaryBackgroundController extends Controller
{
    public function update(Patient $patient, UpdatePatientHereditaryBackgroundRequest $request)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        if(optional($medicalHistory)->hereditary_background_id == null){
            return conflict('El paciente no tiene historial medico',[]);
        }   
        $pathologicalBackground = tap(HereditaryBackground::find($medicalHistory->hereditary_background_id))->update($request->validated());
        return ok('',$pathologicalBackground);
    }
}
