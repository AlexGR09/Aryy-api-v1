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
        $attendance = $request->attendance ? $request->attendance : ['scheduled'];
        $patientMedicalAppointment = Patient::with('medical_appointments.physician','medical_appointments.physician.specialty','medical_appointments.facility')
        ->withWhereHas('medical_appointments', function ($query) use($attendance){
            $query->whereIn('status', $attendance);
        })
        ->where('patients.id' , $patient->id)
        ->first();
        if(empty($patientMedicalAppointment)){
            return conflict('El paciente no tiene citas', []);
        }
        return new CheckMedicalAppointmentResource($patientMedicalAppointment);
    }

    public function destroy(Patient $patient, MedicalAppointment $medicalAppointment)
    {
        if($medicalAppointment->status === 'cancelled'){
            return conflict('La cita ya fue cancelada', []);
        }
        $medicalAppointmentUpdated = tap(MedicalAppointment::where([
            ['id',$medicalAppointment->id],
            ['patient_id', $patient->id]
        ]))
        ->update(['status' => 'cancelled'])
        ->first();
        return response()->json(['data' => $medicalAppointmentUpdated]);
    }
}
