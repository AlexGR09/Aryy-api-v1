<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class PhysicianSpecialtyResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'specialty_id' => $this->specialty_id,
            'license' => $this->license,
            'institution' => $this->institution,
            'license_photo' => $this->license_photo
        ];
    }
}
