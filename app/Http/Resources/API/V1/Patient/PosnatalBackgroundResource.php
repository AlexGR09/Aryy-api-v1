<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class PosnatalBackgroundResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'postnatal_background_id' => $this->id,
            'delivery_details' => $this->delivery_details,
            'baby_name' => $this->baby_name,
            'baby_weight' => $this->baby_weight,
            'baby_health' => $this->baby_health,
            'type_of_feeding' => $this->type_of_feeding,
            'emotonial_state' => $this->emotonial_state,
        ];
        
    }
}
