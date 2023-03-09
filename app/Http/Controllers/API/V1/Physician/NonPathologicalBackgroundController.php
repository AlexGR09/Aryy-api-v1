<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StoreNonPathologicalBackgroundRequest;
use App\Http\Requests\API\V1\Physician\UpdateNonPathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\NonPathologicalBackgroundResource;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use App\Models\Patient;
use App\Models\User;

class NonPathologicalBackgroundController extends Controller
{
    public function show(Patient $patient)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();

        return new NonPathologicalBackgroundResource(
            $medicalHistory->nonpathologicalbackground
        );
    }

    public function store(StoreNonPathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $nonPathologicalBackground = NonPathologicalBackground::create($data);
        MedicalHistory::where('patient_id', $data['patient_id'])->update([
            'non_pathological_background_id' => $nonPathologicalBackground->id,
        ]);

        return (new NonPathologicalBackgroundResource(
            $nonPathologicalBackground
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }

    public function update(User $patient, UpdateNonPathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        $medicalHistory->nonpathologicalbackground()->update(
            $data
        );

        return (new NonPathologicalBackgroundResource(
            $medicalHistory->nonpathologicalbackground
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }
}
