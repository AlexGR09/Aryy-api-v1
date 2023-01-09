<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAllergyPatientRequest;
use App\Http\Requests\UpdateAllergyPatientRequest;
use App\Models\MedicalHistory;
use App\Models\User;

class AllergyController extends Controller
{
    public function show(User $patient )
    {
        $medicalHistory = MedicalHistory::where('user_id', $patient->id)->first();
        return ok('', optional($medicalHistory)->allergyPatient);
    }

    public function store(User $patient, StoreAllergyPatientRequest $request)
    {
        $medicalHistory = MedicalHistory::where('user_id', $patient->id)->first();
        return ok('', optional($medicalHistory)->allergyPatient()->create($request->validated()));
    }

    public function update(User $patient, UpdateAllergyPatientRequest $request)
    {
        $medicalHistory = MedicalHistory::where('user_id', $patient->id)->first();
        return ok('', optional($medicalHistory)->allergyPatient()->update($request->validated()));
    }
}
