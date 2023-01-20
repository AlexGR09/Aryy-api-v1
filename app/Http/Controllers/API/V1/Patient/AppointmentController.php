<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\StoreAppointmentRequest;
use App\Models\Facility;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use App\Models\Physician;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(StoreAppointmentRequest $request)
    {
        $data = $request->validated();
        $facility = Facility::find($data['facility_id']);

        if(!$facility->checkValidDate($data['appointment_date'], $data['appointment_time'])){
            return ok('El usuario no puede agendar en esta fecha',[]);
        }
        $appointmentTimeEnd = Carbon::parse($data['appointment_date'] .' '. $data['appointment_time'])->addMinutes($facility->consultation_length);
        $medicalAppointment = MedicalAppointment::greaterThanDate($data['appointment_date'], $data['appointment_time'])
        ->lowerThanDate($data['appointment_date'], $appointmentTimeEnd)
        ->first();
        if (!empty($medicalAppointment)) {
            return ok('La fecha seleccionada ya fue ocupada',[]);
        }

        $medicalAppointment = MedicalAppointment::create([
            'appointment_date' => $data['appointment_date'],
            'appointment_time' => $data['appointment_time'],
            'appointment_time_end' => $appointmentTimeEnd,
            'patient_id' => Patient::where('user_id', auth()->id())->first()->id,
            'physician_id' => $data['physician_id'],
            'facility_id' => $data['facility_id'],
            'appointment_type' => $data['appointment_type'],
        ]);
        return ok('',$medicalAppointment);
    }
}
