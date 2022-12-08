<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialtyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'specialty_id' => $this->id,
            'name' => $this->name,
        ];
    }
}
