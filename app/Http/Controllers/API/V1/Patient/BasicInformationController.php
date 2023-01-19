<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\StoreVitalSignRequest as PatientStoreVitalSignRequest;
use App\Http\Requests\API\V1\Patient\UpdateVitalSignRequest as PatientUpdateVitalSignRequest;
use App\Models\Patient;
use App\Models\VitalSign;

class BasicInformationController extends Controller
{
    public function show(Patient $patient)
    {
        $patientInfo = clone $patient;
        $vitalSign = $patient->vitalSign;
        $medicalHistory = $patient->medicalHistory;

        return ok('', [
            'patient' => $patientInfo,
            'vital_sign' => $vitalSign,
            'medical_history' => $medicalHistory,
        ]);
    }

    public function store(PatientStoreVitalSignRequest $request)
    {
        return ok('', VitalSign::create($request->validated()));
    }

    public function update(Patient $patient, PatientUpdateVitalSignRequest $request)
    {
        VitalSign::where('patient_id', $patient->id)->update($request->validated());
        return ok('', VitalSign::where('patient_id', $patient->id)->first());
    }
}
