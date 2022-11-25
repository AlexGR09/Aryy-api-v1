<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class AllergyPatientResoucer extends JsonResource
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
            'food_allergy' => $this->food_allergy,
            'drug_allergy' => $this->drug_allergy,
            'environmental_allergy' => $this->environmental_allergy,
        ];
    }
}
