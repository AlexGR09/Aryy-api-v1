<?php

namespace App\Http\Resources\API\V1\Physician;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewCalendarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $hora_inicio = $this->appointment_time;
        $hora_fin = $this->appointment_time_end;
        /* $date_start = new DateTime("$this->appointment_date $hora_inicio");
        $date_end = new DateTime("$this->appointment_date $hora_fin"); */
        $date_end = $hora_fin->setTimezone($request->timeZone);
        $date_start=$hora_inicio->setTimezone($this->timeZone);
        return [
            'id_appointment' => $this->id,
            'patient_full_name' => $this->patient->full_name,
            'appointment_date' => $this->appointment_date,
            'appointment_start' => $date_start->format('Y-m-d\TH:i:s'),
            'appointment_end' => $date_end->format('Y-m-d\TH:i:s'),
            'appointment_type' => $this->appointment_type,
            'facility_name' => $this->facility->name,
            'status' => $this->status,
        ];
    }
}
