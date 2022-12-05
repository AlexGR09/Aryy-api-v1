<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
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
        ];
    }
}
