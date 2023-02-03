<?php

namespace App\Http\Resources\API\V1\Patient;

use App\Http\Resources\API\V1\Patient\MedicalAppointmentResource as PatientMedicalAppointmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckMedicalAppointmentResource extends JsonResource
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
            'medical_appointments' => PatientMedicalAppointmentResource::collection($this->whenLoaded('medical_appointments')),
        ];
    }
}
