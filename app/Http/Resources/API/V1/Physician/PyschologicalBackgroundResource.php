<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class PyschologicalBackgroundResource extends JsonResource
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
            'Pyschological_background_id'=>$this->id,
            'family_history' => $this->family_history,
            'disease_awareness' => $this->disease_awareness,
            'areas_affected_by_the_disease' => $this->areas_affected_by_the_disease,
            'family_support_group' => $this->family_support_group,
            'family_group_of_the_patient' => $this->family_group_of_the_patient,
            'aspects_of_social_life' => $this->aspects_of_social_life,
            'aspects_of_working_life' => $this->aspects_of_working_life,
            'relationship_whit_authority' => $this->relationship_whit_authority,
            'inpulse_control' => $this->inpulse_control,
            'frustration_management' => $this->frustration_management,
        ];
    }
}
