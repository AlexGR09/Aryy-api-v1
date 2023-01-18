<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StorePathologicalBackgroundRequest;
use App\Http\Requests\API\V1\Physician\UpdatePathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\PathologicalBackgroundResource;
use App\Models\MedicalHistory;
use App\Models\Patient;

class PathologicalBackgroundController extends Controller
{
    public function show(Patient $patient)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();

        return new PathologicalBackgroundResource(
            $medicalHistory->pathologicalbackground
        );
    }

    public function store(StorePathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $medicalHistory = MedicalHistory::where('patient_id', $data['patient_id'])->first();
        $medicalHistory->pathologicalbackground()->create($data);

        return (new PathologicalBackgroundResource(
            $medicalHistory->pathologicalbackground
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }

    public function update(Patient $patient, UpdatePathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        $medicalHistory->pathologicalbackground()
        ->update($data);

        return (new PathologicalBackgroundResource(
            $medicalHistory->pathologicalbackground
        ))
        ->additional(['message' => 'Informacion guardada con exito.']);
    }
}
