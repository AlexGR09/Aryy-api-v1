<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\MedicalAppointmentResource;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index(MedicalAppointment $medicalAppointment){
        $medicalAppointment = MedicalAppointment::find($medicalAppointment->id)->with(
            'physician',
            'physician.physician_specialty',
            'facility', 
            'medicalHistory',
            'medicalHistory.allergyPatient',
            'prescription.vitalSigns'
            )
            ->withWhereHas('prescription')
        ->first();

        return ok('',$medicalAppointment);
    }
}
