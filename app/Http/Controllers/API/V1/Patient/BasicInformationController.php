<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\StoreVitalSignRequest as PatientStoreVitalSignRequest;
use App\Http\Requests\API\V1\Patient\UpdateVitalSignRequest as PatientUpdateVitalSignRequest;
use App\Http\Requests\API\V1\StorePatientInfoRequest;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\User;
use App\Models\VitalSign;

class BasicInformationController extends Controller
{
    public function show(Patient $patient, MedicalAppointment $medicalAppointment)
    {
        $patientInfo = clone $patient;
        $vitalSignId = $medicalAppointment->prescription->vital_sign_id;
        $vitalSign = VitalSign::find($vitalSignId);
        $medicalHistory = $patient->medicalHistory;

        return ok('', [
            'patient' => $patientInfo,
            'vital_sign' => $vitalSign,
            'medical_history' => $medicalHistory,
        ]);
    }

    public function store(PatientStoreVitalSignRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::find($data['patient_id']);
        $medicalAppointment = MedicalAppointment::where(
            [
                ['id', $data['medical_appointment_id']],
                ['patient_id', $patient->id]
            ]
        )
        ->first();
        if(empty($medicalAppointment)){
            return not_found('Recurso no encontrado',[]);
        }
        if(!empty($medicalAppointment->prescription->vital_sign_id)){
            return conflict('Este registro ya tiene una relacion signos vitales',[]);
        }
        $vitalSign = VitalSign::create($data);
        $medicalAppointment->prescription()->update(['vital_sign_id' =>  $vitalSign->id]);

        return ok('', $vitalSign);
    }

    public function update(Patient $patient, MedicalAppointment $medicalAppointment, PatientUpdateVitalSignRequest $request)
    {
        $data = $request->validated();
        $vitalSignId = $medicalAppointment->where('patient_id', $patient->id)->first()->prescription->vital_sign_id;
        $vitalSign = tap(VitalSign::find($vitalSignId))
            ->update($data);

        return ok('', $vitalSign);
    }

    public function storePatientInfo(Patient $patient, StorePatientInfoRequest $request)
    {
        $data = $request->validated();
        $user = tap($patient->user)
        ->update([
            'phone_number' => $data['phone_number']
        ]);
        $patients = Patient::find($patient->id)
        ->update([
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'full_name' => $data['full_name']
        ]);

        $medicalHistory = MedicalHistory::updateOrCreate(
            ['patient_id' =>  $patient->id],
            ['height', $data['height'], 'blood_type' => $data['blood_type']]
        );
        return ok('',['medical_history' => $medicalHistory, 'patients' => $patients, 'user' => $user]);
    }
}
