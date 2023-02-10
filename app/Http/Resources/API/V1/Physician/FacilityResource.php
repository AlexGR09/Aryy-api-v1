<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
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
            // 'attetion_time' => $this->attetion_time,
            // 'state' => $this->state,
            // 'city' => $this->city,
            // // 'town' => $this->town,
            // // 'street' => $this->street,
            // // 'exterior_no' => $this->exterior_no,
            // // 'interior_no' => $this->interior_no,
            // // 'references' => $this->references,
            // 'accessibility_and_others' => $this->accessibility_and_others,
            // 'public_target' => $this->public_target,
            // 'services' => $this->services,
        ];
    }
}
