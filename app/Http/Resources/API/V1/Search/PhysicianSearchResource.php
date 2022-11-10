<?php

namespace App\Http\Resources\API\V1\Search;

use App\Http\Resources\API\V1\Physician\PhysicianSpecialtyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PhysicianSearchResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'physician_id' => $this->id,
            'professional_name' => $this->professional_name,
            'certificates' => json_decode($this->certificates),
            'social_networks' => json_decode($this->social_networks),
            'biography' => $this->biography,
            'is_verified' => $this->is_verified,
            'physician_specialties' => PhysicianSpecialtyResource::collection($this->physician_specialty),
        ];
    }
}
