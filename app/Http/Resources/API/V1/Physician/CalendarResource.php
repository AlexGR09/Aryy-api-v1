<?php

namespace App\Http\Resources\API\V1\Physician;

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
        $date_start = $this->appointment_date.'T'.$this->appointment_time;
        $date_end = $this->appointment_date.'T'.$this->appointment_time_end;

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
