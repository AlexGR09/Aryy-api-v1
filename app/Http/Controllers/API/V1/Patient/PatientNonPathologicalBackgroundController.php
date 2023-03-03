<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\UpdatePatientNonPathologicalBackgroundRequest;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientNonPathologicalBackgroundController extends Controller
{
    public function update(Patient $patient, UpdatePatientNonPathologicalBackgroundRequest $request)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        if(optional($medicalHistory)->non_pathological_background_id == null){
            return conflict('El paciente no tiene historial medico',[]);
        } 
        $pathologicalBackground = tap(NonPathologicalBackground::find($medicalHistory->non_pathological_background_id))->update($request->validated());
        return ok('',$pathologicalBackground );
    }
}
