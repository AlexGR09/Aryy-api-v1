<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BasicInformationController extends Controller
{
    public function show(User $patient)
    {
        $vitalSign = $patient->vitalSign;
        $medicalHistory = $patient->medicalHistory;
        $patientInfo = $patient->patient;

        return ok('',[
            'vital_sign' => $vitalSign, 
            'medical_history' =>  $medicalHistory,
            'patient' => $patientInfo
        ]);
    }
}
