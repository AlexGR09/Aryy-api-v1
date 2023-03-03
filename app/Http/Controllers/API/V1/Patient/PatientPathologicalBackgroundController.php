<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\UpdatePatientPathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\PathologicalBackgroundResource;
use App\Models\MedicalHistory;
use App\Models\PathologicalBackground;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientPathologicalBackgroundController extends Controller
{
    public function update(Patient $patient, UpdatePatientPathologicalBackgroundRequest $request)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        if(optional($medicalHistory)->pathological_background_id == null){
            return conflict('El paciente no tiene historial medico',[]);
        } 
        $pathologicalBackground = tap(PathologicalBackground::find($medicalHistory->pathological_background_id))->update($request->validated());

        return (new PathologicalBackgroundResource(PathologicalBackground::find($medicalHistory->pathological_background_id)))->additional(['message' => 'Informacion actualizada con exito.']);

    }
}
