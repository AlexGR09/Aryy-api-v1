<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\StoreAllergyPatientRequest;
use App\Http\Requests\API\V1\Patient\UpdateAllergyPatientRequest;
use App\Models\AllergyPatient;
use App\Models\MedicalHistory;
use App\Models\Patient;

class AllergyController extends Controller
{
    public function show(Patient $patient)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();

        return ok('', optional($medicalHistory)->allergyPatient);
    }

    public function store(StoreAllergyPatientRequest $request)
    {
        $data = $request->validated();
        $medicalHistory = MedicalHistory::where('patient_id', $data['patient_id'])->first();
        if ($medicalHistory?->allergyPatient()->exists()) {
            return unauthorized('Ya existe un registro de alergias');
        }

        $allergyPatient = AllergyPatient::create($data);
        MedicalHistory::updateOrCreate(
            ['patient_id' => $data['patient_id']],
            ['allergy_patient_id' => $allergyPatient->id]
        );

        return ok('', $allergyPatient);
    }

    public function update(Patient $patient_id, UpdateAllergyPatientRequest $request)
    {  
        $medicalHistory = MedicalHistory::where('patient_id', $patient_id->id)->first();
        optional($medicalHistory)->allergyPatient()->update($request->validated());

        return ok('', optional($medicalHistory)->allergyPatient);
    }
}
