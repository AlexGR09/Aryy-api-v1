<?php

namespace App\Http\Resources\API\V1\Physician;

use Carbon\Carbon;
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
        $date_start = $this->appointment_time->format('H:i:s');
        $date_end = $this->appointment_time_end->format('H:i:s');

        $date_appointment_start = Carbon::createFromFormat("Y-m-d H:i:s","$this->appointment_date $date_start");
        $date_appointment_end = Carbon::createFromFormat("Y-m-d H:i:s","$this->appointment_date $date_end");

        return[
            'id_appointment' => $this->id,
            'patient_full_name' => $this->patient->full_name,
            'appointment_date' => $this->appointment_date,
            'appointment_start' => $date_appointment_start->format('Y-m-d\TH:i:s'),
            'appointment_end' => $date_appointment_end->format('Y-m-d\TH:i:s'),
            'appointment_type' => $this->appointment_type,
            'facility_name' => $this->facility->name,
            'status' => $this->status,
        ];
    }
}
