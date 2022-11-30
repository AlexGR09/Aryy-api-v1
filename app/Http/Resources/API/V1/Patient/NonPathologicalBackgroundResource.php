<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class NonPathologicalBackgroundResource extends JsonResource
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
            'physical_activity' => json_decode($this->physical_activity),
            'rest_time' => json_decode($this->rest_time),
            'smoking' => json_decode($this->smoking),
            'alcoholim' => json_decode($this->alcoholim),
            'other_substances' => $this->other_substances,
            'diet' => $this->diet,
            'drug_active' => $this->drug_active,
            'previous_medication' => $this->previous_medication
        ];
    }
}
