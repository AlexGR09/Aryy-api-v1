<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class CalendarAppointmentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id_appointment' => $this->id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
          
            // 'patient' => $this->patient,
        ];
    }
}
