<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Patient\StoreVitalSignRequest;
use App\Http\Requests\API\Patient\UpdateVitalSignRequest;
use App\Models\Patient;
use App\Models\User;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class BasicInformationController extends Controller
{
    public function show(Patient $patient)
    {
        $patientInfo = clone($patient);
        $vitalSign = $patient->vitalSign;
        $medicalHistory = $patient->medicalHistory;

        return ok('', [
            'patient' => $patientInfo,
            'vital_sign' => $vitalSign,
            'medical_history' =>  $medicalHistory,
        ]);
    }

    public function store(StoreVitalSignRequest $request)
    {
        $data = $request->validated();
        $user = User::find($data['user_id']);
        $vitalSignCreated = $user->vitalSign->create($data);
        return ok('', $vitalSignCreated);
    }

    public function update(UpdateVitalSignRequest $request)
    {
        $data = $request->validated();
        $user = User::find($data['user_id']);
        $user->vitalSign->update($data);
        return ok('',  $user->vitalSign);
    }
}
