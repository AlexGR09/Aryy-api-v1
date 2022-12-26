<?php

namespace App\Http\Resources\API\V1\Physician;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarAppointmentResource extends JsonResource
{

    public function toArray($request)
    {
        // $date = $this->appointment_date->format('Y-m-d');

        return [
            'id_appointment' => $this->id,
            'patient_full_name' => $this->patient->full_name,
            'patient_user_country_code' => $this->patient->user->country_code,
            'patient_user_phone_number' => $this->patient->user->phone_number,
            // 'appointment_date' => $this->appointment_date,
            'appointment_date' => Carbon::parse($this->appointment_date)->translatedFormat('d-F-y'),
            // 'dia' => Carbon::parse($this->appointment_date)->dayName,
            // 'mes' => Carbon::parse($this->appointment_date)->monthName,
            'appointment_time' => $this->appointment_time,
            'appointment_type' => $this->appointment_type,
            'facility_name' => $this->facility->name,
        ];
    }
}
