<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'state_id' => $this->id,
            'name' => $this->name,
            'country_id' => $this->country_id,
            'country' => new CountryResource($this->country),
        ];
    }
}
