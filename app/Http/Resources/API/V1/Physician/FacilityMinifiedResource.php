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
            'address' => json_decode((string) $this->location, true, 512, JSON_THROW_ON_ERROR)['address'],
        ];
    }
}
