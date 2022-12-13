<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalServicePhysicianResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'medical_service_id' => $this->medical_service_id,
            'price' => $this->price,
        ];
    }
}
