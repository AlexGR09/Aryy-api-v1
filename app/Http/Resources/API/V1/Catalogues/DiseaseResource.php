<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class DiseaseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'disease_id' => $this->id,
            'name' => $this->name,
        ];
    }
}
