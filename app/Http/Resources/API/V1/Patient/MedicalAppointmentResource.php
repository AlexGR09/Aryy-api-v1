<?php

namespace App\Http\Resources\API\V1\Patient;

use App\Http\Resources\API\V1\Physician\PrescriptionResource;
use App\Models\MedicalHistory;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalAppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'physician_id' => $this->physician_id,
            'facility_id' => $this->facility_id,
            'prescription_id' => $this->prescription_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time->format('H:i'),
            'appointment_time_end' => $this->appointment_time_end->format('H:i'),
            'appointment_type' => $this->appointment_type,
            'status' => $this->status,
            'note' => $this->note,
            'relationship' => $this->relationship,
            // 'deleted_at' => $this->deleted_at,
            'cost' => $this->cost,
            'physician' => new PhysicianResource($this->whenLoaded('physician')),
            'facility' => new FacilityResource($this->whenLoaded('facility')),
            'medical_history' => new MedicalHistoryResource($this->whenLoaded('medical_history')),
            'prescription' => new PrescriptionResource($this->whenLoaded('prescription'))
        ];
    }
}
