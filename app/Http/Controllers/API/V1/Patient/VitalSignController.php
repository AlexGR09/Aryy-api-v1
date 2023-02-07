<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\StoreVitalSignRequest as PatientStoreVitalSignRequest;
use App\Http\Requests\API\V1\Patient\UpdateVitalSignRequest as PatientUpdateVitalSignRequest;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\VitalSign;

class VitalSignController extends Controller
{
    public function show(Patient $patient)
    {
        return ok(
            '',
            $patient
                ->medical_appointments()
                ->prescription()
                ->vitalSign
        );
    }

    public function patientInfo(Patient $patient)
    {
        return ok('', $patient);
    }

    public function store(PatientStoreVitalSignRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::find($data['patient_id']);
        $vitalSign = VitalSign::create($data);

        $prescription = Prescription::create(['vital_sign_id' => $vitalSign->id]);

        MedicalAppointment::where('patient_id', $patient->id)
        ->update(['prescription_id' => $prescription->id]);

        return ok('', $vitalSign);
    }

    public function update(VitalSign $vitalSign, PatientUpdateVitalSignRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::find($data['patient_id']);
        $vitalSignCreated = $patient
            ->medical_appointments()
            ->prescription()
            ->vitalSign()
            ->update($patient);

        return ok('', $patient
            ->medical_appointments()
            ->prescription()
            ->vitalSign);
    }
}
