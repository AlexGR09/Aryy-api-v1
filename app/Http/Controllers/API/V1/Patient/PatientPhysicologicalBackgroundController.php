<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\UpdatePatientPhysicologicalBackgroundRequest;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\PyschologicalBackground;
use Illuminate\Http\Request;

class PatientPhysicologicalBackgroundController extends Controller
{
    public function update(Patient $patient,UpdatePatientPhysicologicalBackgroundRequest $request )
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        if(optional($medicalHistory)->pathological_background_id == null){
            return conflict('El paciente no tiene historial medico',[]);
        } 
        $pathologicalBackground = tap(PyschologicalBackground::find($medicalHistory->pathological_background_id))->update($request->validated());
        return ok('',$pathologicalBackground );

    }
}
