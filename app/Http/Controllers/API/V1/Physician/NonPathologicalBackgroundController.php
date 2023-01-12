<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\NonPathologicalBackgroundRequest;
use App\Http\Requests\API\V1\Physician\StoreNonPathologicalBackgroundRequest;
use App\Http\Requests\API\V1\Physician\UpdateNonPathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\NonPathologicalBackgroundResource;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use App\Models\User;
use Illuminate\Http\Request;

class NonPathologicalBackgroundController extends Controller
{
    public function show(User $patient)
    {
        return (new NonPathologicalBackgroundResource(
            MedicalHistory::where('patient_id', $patient->id)->first()
        ));
    }

    public function store(StoreNonPathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $pathologicalBackground = NonPathologicalBackground::create([
            $data
        ]);
        return (new NonPathologicalBackgroundResource(
            tap(MedicalHistory::where('patient_id', $data['patient_id']))->update(
                ['pathological_background_id' => $pathologicalBackground->id]
            )
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }

    public function update(User $patient, UpdateNonPathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $pathologicalBackground = NonPathologicalBackground::create([
            $data
        ]);
        return (new NonPathologicalBackgroundResource(
            tap(MedicalHistory::where('patient_id', $patient->id))->update(
                ['pathological_background_id' => $pathologicalBackground->id]
            )
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }
}
