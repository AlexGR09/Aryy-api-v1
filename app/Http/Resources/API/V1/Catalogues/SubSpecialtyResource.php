<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class SubSpecialtyResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'sub_specialty_id' => $this->id,
            'name' => $this->name,
            'specialty_id' => $this->specialty_id
        ];
    }
}
