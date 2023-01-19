<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientMedicalAppointmentResource extends JsonResource
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
            'patient_id' => $this->id,
            'full_name' => $this->full_name,
            'phone_number' => $this->user->phone_number,
            'country_code' => $this->country_code,
            'emergency_number' => $this->emergency_number,

        ];
    }
}
