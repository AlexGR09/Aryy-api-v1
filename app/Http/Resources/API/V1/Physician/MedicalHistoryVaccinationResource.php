<?php

namespace App\Http\Resources\API\V1\Physician;

use App\Http\Resources\API\V1\Patient\VaccinationHistoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalHistoryVaccinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'patient_vaccination_history_id' => $this->id,
            'vaccination_history_id' => $this->vaccination_history_id,
            'vacination' => VaccinationHistoryResource::collection($this->vaccination_history),
            'patient_id' => $this->patient_id,
        ];
    }
}