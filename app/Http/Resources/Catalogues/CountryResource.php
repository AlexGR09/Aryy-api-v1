<?php

namespace App\Http\Resources\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'country_id' => $this->id,
            'name' => $this->name
        ];
    }
}
