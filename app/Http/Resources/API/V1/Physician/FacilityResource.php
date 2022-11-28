<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'facility_id' => $this->id,
            'facility_name' => $this->facility_name,
            'location' => json_decode($this->location),
            'phone_number' => $this->phone_number,
            'zip_code' => $this->zip_code,
            'schedule' => json_decode($this->schedule),
            'type_schedule' => $this->type_schedule,
            'consultation_length' => $this->consultation_length,
            'accessibility_and_others' => json_decode($this->accessibility_and_others),
            'clues' => $this->clues,
            'city_id' => $this->city_id,
        ];
    }
}
