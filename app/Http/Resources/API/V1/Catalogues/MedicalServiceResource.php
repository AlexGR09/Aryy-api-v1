<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'medical_service_id' => $this->id,
            'name' => $this->name
        ];
    }
}
