<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerinatalBackgroundRequest;
use App\Http\Requests\UpdatePerinatalBackgroundRequest;
use App\Models\MedicalHistory;
use App\Models\User;

class PerinatalBackgroundController extends Controller
{
    public function show(User $patient)
    {
        $medicalHistory = MedicalHistory::where('user_id', $patient->id)->first();

        return ok('', $medicalHistory->perinatalBackground);
    }

    public function store(User $patient, StorePerinatalBackgroundRequest $request)
    {
        $medicalHistory = MedicalHistory::where('user_id', $patient->id)->first();

        return ok('', $medicalHistory->perinatalBackground()->create($request->validated()));
    }

    public function update(User $patient, UpdatePerinatalBackgroundRequest $request)
    {
        $medicalHistory = MedicalHistory::where('user_id', $patient->id)->first();

        return ok('', $medicalHistory->perinatalBackground()->update($request->validated()));
    }
}
