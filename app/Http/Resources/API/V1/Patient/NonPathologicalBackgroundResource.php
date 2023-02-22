<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class NonPathologicalBackgroundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    {
        return [
            'non_pathological_backgroud_id' => $this->id,
            'physical_activity' => $this->physical_activity,
            'rest_time' => $this->rest_time,
            'smoking' => $this->smoking,
            'alcoholim' => $this->alcoholim,
            'other_substances' => $this->other_substances,
            'diet' => $this->diet,
            'drug_active' => $this->drug_active,
            'previous_medication' => $this->previous_medication,
        ];
    }
}