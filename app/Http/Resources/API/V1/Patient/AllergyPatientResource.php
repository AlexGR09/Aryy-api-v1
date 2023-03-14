<?php

namespace App\Http\Resources\API\V1\Patient;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AllergyPatientResource extends JsonResource
{
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    {
        $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('Y-m-d');
        return [
            'allergy_patient_id' => $this->id,
            'patient_id' => $this->id,
            'food_allergy' => $this->food_allergy,
            'drug_allergy' => $this->drug_allergy,
            'environmental_allergy' => $this->environmental_allergy,
            'updated_at' => $updated_at,
        ];
    }
}