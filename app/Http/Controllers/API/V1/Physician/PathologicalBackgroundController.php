<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StorePathologicalBackgroundRequest;
use App\Http\Requests\API\V1\Physician\UpdatePathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\PathologicalBackgroundResource;
use App\Models\MedicalHistory;
use App\Models\PathologicalBackground;
use App\Models\User;
use Illuminate\Http\Request;

class PathologicalBackgroundController extends Controller
{
    public function show(User $patient)
    {
        return (new PathologicalBackgroundResource(
            MedicalHistory::where('patient_id', $patient->id)->first()
        ));
    }

    public function store(StorePathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $pathologicalBackground = PathologicalBackground::create([
            $data
        ]);
        return (new PathologicalBackgroundResource(
            tap(MedicalHistory::where('patient_id', $data['patient_id']))->update(
                ['pathological_background_id' => $pathologicalBackground->id]
            )
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }

    public function update(User $patient, UpdatePathologicalBackgroundRequest $request)
    {
        $data = $request->validated();
        $pathologicalBackground = PathologicalBackground::create([
            $data
        ]);
        return (new PathologicalBackgroundResource(
            tap(MedicalHistory::where('patient_id', $patient->id))->update(
                ['pathological_background_id' => $pathologicalBackground->id]
            )
        ))->additional(['message' => 'Informacion guardada con exito.']);
    }
}
