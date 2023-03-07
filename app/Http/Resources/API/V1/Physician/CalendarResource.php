<?php

namespace App\Http\Resources\API\V1\Physician;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $fecha = $this->appointment_date . ' ' . $this->appointment_time->format('H:i:s');
        $fecha2 = $this->appointment_date . ' ' . $this->appointment_time_end->format('H:i:s');
        $date_start = (new DateTime($fecha))->format('c');
        $date_end = (new DateTime($fecha2))->format('c');

        return[
            'id_appointment' => $this->id,
            'patient_full_name' => $this->patient->full_name,
            'appointment_date' => $this->appointment_date,
            'appointment_start' => $date_start,
            'appointment_end' => $date_end,
            'appointment_type' => $this->appointment_type,
            'facility_name' => $this->facility->name,
            'status' => $this->status,
        ];
    }
}
