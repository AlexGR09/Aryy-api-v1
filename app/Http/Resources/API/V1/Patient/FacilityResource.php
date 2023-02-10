<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
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
            'name' => $this->name,
            'location' => $this->location,
            'phone' => $this->phone,
            'extension' => $this->extension,
            'zipcode' => $this->zipcode,
            'schedule' => $this->schedule,
            'type_schedule' => $this->type_schedule,
            'consultation_length' => $this->consultation_length,
            'accessibility_and_others' => $this->accessibility_and_others,
            'city_id' => $this->city_id,
            'coordinates' => $this->coordinates,
            'calling_attetion_schedule' => $this->calling_attetion_schedule,
        ];
    }
}
