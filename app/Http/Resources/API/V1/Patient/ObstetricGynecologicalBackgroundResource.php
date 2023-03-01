<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class ObstetricGynecologicalBackgroundResource extends JsonResource
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
            'obstetric_gynecological_background_id' => $this->id,
            'first_menstruation' => $this->first_menstruation,
            'last_menstruation' => $this->last_menstruation,
            'bleeding' => $this->bleeding,
            'pain' => $this->pain,
            'intimate_hygiene' => $this->intimate_hygiene,
            'cervical_discharge' => $this->cervical_discharge,
            'sex' => $this->sex,
            'pregnancies' => $this->pregnancies,
            'cervical_cancer' => $this->cervical_cancer,
            'breast_cancer' => $this->breast_cancer,
            'sexually_active' => $this->sexually_active,
            'family_planning' => $this->family_planning,
            'hormone_replacement_therapy' => $this->hormone_replacement_therapy,
            'last_pap_smear' => $this->last_pap_smear,
            'last_mammography' => $this->last_mammography,
        ];
    }
}
