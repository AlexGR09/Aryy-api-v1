<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityMinifiedResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'facility_id' => $this->id,
            'facility_name' => $this->facility_name,
            'address' => json_decode($this->location, true)['address'] ,
        ];
    }
}
