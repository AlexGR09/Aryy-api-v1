<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use App\Models\Physician;
use App\Services\AppointmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhysicianMedicalAppointmentController extends Controller
{
    public function index(Patient $patient, Request $request)
    {
        $attendance = $request->attendance;
        return response()->json(["data" => Patient::with('medical_appointments','medical_appointments.facility')
        ->where('id' , $patient->id)
        ->whereHas('medical_appointments', function($q) use($attendance){
            $q->where('status', $attendance);
        })
        ->get()]);
    }

    public function destroy(Patient $patient, MedicalAppointment $medicalAppointment)
    {
        $medicalAppointment->where('patient', $patient->id)->delete();
        return response()->json(['data' => $medicalAppointment]);
    }
}
