<?php

namespace App\Http\Resources\API\V1\Physician;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarAppointmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'appointment_id' => $this->id,
            'appointment_date' => Carbon::parse($this->appointment_date)->translatedFormat('d-F-y'),
            'appointment_time' => $this->appointment_time->format('H:i:s'),
            'appointment_type' => $this->appointment_type,
            'status' => $this->status,
            'patient' => [
                'patient_id' => $this->patient->id,
                'full_name' => $this->patient->full_name,
                'user_country_code' => $this->patient->user->country_code,
                'user_phone_number' => $this->patient->user->phone_number,
            ],
            'facility' => [
                'facility_id' => $this->facility->id,
                'facility_name' => $this->facility->name,
            ],
        ];
    }
}
