<?php

namespace App\Http\Resources\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'city_id' => $this->id,
            'name' => $this->name,
            'state_id' => $this->state_id
        ];
    }
}
