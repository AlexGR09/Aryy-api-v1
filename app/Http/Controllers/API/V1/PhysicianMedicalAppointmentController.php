<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\CheckMedicalAppointmentResource;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class PhysicianMedicalAppointmentController extends Controller
{
    public function index(Patient $patient, Request $request)
    {
        $attendance = $request->attendance ? $request->attendance : 'scheduled';
        return new CheckMedicalAppointmentResource(Patient::with('medical_appointments','medical_appointments.physician','medical_appointments.physician.specialty','medical_appointments.facility')
        ->where('id' , $patient->id)
        ->whereHas('medical_appointments', function($q) use($attendance){
            $q->where('status', $attendance);
        })
        ->first());
    }

    public function destroy(Patient $patient, MedicalAppointment $medicalAppointment)
    {
        $medicalAppointmentUpdated = tap($medicalAppointment->where('patient', $patient->id))->update(['status' => 'cancelled']);
        return response()->json(['data' => $medicalAppointmentUpdated]);
    }
}
