<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'insurance_id' => $this->id,
            'name' => $this->name,
        ];
    }
}
