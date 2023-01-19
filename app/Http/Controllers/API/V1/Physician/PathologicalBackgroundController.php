<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StorePathologicalBackgroundRequest;
use App\Http\Requests\API\V1\Physician\UpdatePathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\PathologicalBackgroundResource;
use App\Models\MedicalHistory;
use App\Models\PathologicalBackground;
use App\Models\Patient;

class PathologicalBackgroundController extends Controller
{
    public function show(Patient $patient)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        if(!$medicalHistory->pathologicalBackground()->exists()){
            return ok('El paciente no tiene historial patologico',[]);
        }
        return new PathologicalBackgroundResource(
            $medicalHistory->pathologicalBackground
        );
    }

    public function store(StorePathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $pathologicalBackground = PathologicalBackground::create($data);
        $medicalHistory = MedicalHistory::where('patient_id', $data['patient_id'])->update(
            ['pathological_background_id' => $pathologicalBackground->id]
        );
        return (new PathologicalBackgroundResource(
            $pathologicalBackground
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }

    public function update(Patient $patient, UpdatePathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        $medicalHistory->pathologicalBackground()
        ->update($data);

        return (new PathologicalBackgroundResource(
            $medicalHistory->pathologicalBackground
        ))
        ->additional(['message' => 'Informacion guardada con exito.']);
    }
}
