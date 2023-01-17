<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalAppointmentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'medical_appointment_id' => $this->id,
            'patient_id' => $this->patient_id,
            'patient_name' => $this->patient->full_name,
            'status' => $this->status,
            'appointment_date' => $this->appointment_date,
            'note' => $this->note,
            'prescription' => $this->prescription
        ];
    }
}
