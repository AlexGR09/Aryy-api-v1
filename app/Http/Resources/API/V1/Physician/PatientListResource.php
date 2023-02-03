<?php

namespace App\Http\Resources\API\V1\Physician;

use App\Models\MedicalAppointment;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lastAppointment = MedicalAppointment::where('physician_id', $this->physician_id)->latest()->first();

        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'patient' => new ViewPatientListResource($this->patient),
            'status' => $this->status,
            'last_appointment' => $lastAppointment->appointment_date,
        ];
    }
}
