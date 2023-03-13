<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use DateTimeZone;

class NewPatientAppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //Hora de inicio de la consulta
        $appointmentTime = $this->appointment_time->format('H:i:s');

        $appointmentTime = Carbon::createFromFormat('H:i:s', $appointmentTime);
        //mostramos la hora con el formato de la zona horaria a la que pertenece el usuario
        $appointmentTimeStart = $appointmentTime->setTimezone(new DateTimeZone($request->timeZone))->format('H:i:s');

        //Concatenamos la fecha y la hora de la consulta
        $date_appointment_start = Carbon::createFromFormat("Y-m-d H:i:s", "$this->appointment_date $appointmentTimeStart");

        //hora de termino de la consulta
        $appointmentTimeEnd = $this->appointment_time_end->format('H:i:s');
        $appointmentTimeEnd;

        $appointmentTimeEnd = Carbon::createFromFormat('H:i:s', $appointmentTimeEnd);

        //mostramos la hora con el formato de la zona horaria a la que pertenece el usuario
        $appointmentTimeEnd = $appointmentTimeEnd->setTimezone(new DateTimeZone($request->timeZone))->format('H:i:s');

        //Concatenamos la fecha y la hora de la consulta
        $date_appointment_end = Carbon::createFromFormat("Y-m-d H:i:s", "$this->appointment_date $appointmentTimeEnd");

        return [
            'id_appointment' => $this->id,
            'patient_full_name' => $this->patient->full_name,
            'appointment_date' => $this->appointment_date,
            'appointment_start' => $date_appointment_start->format('Y-m-d\TH:i:s'),
            'appointment_end' => $date_appointment_end->format('Y-m-d\TH:i:s'),
            'Time Zone' => $request->timeZone,
            'appointment_type' => $this->appointment_type,
            'facility_name' => $this->facility->name,
            'status' => $this->status,
        ];
    }
}
