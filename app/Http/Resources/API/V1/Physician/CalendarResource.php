<?php

namespace App\Http\Resources\API\V1\Physician;

use App\Http\Resources\API\V1\Patient\PatientResource;
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
        return[
            'id_appointment' => $this->id,
            'patient_full_name' => $this->patient->full_name,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'appointment_type' => $this->appointment_type,
            'facility_name' => $this->facility->name,
        ];
    }
}
