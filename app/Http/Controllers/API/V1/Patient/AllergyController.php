<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\UpdateAllergyPatientRequest;
use App\Http\Requests\API\V1\Patient\StoreAllergyPatientRequest;
use App\Models\MedicalHistory;
use App\Models\User;

class AllergyController extends Controller
{
    public function show(User $patient)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        return ok('', optional($medicalHistory)->allergyPatient);
    }

    public function store(StoreAllergyPatientRequest $request)
    {
        $data = $request->validated();
        $medicalHistory = MedicalHistory::where('patient_id', $data['patient_id'])->first();
        return ok('', optional($medicalHistory)->allergyPatient()->create($request->validated()));
    }

    public function update(User $patient, UpdateAllergyPatientRequest $request)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        return ok('', optional($medicalHistory)->allergyPatient()->update($request->validated()));
    }
}
