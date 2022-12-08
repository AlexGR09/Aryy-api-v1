<?php

namespace App\Http\Resources\API\V1\Physician;

use App\Http\Resources\API\V1\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PhysicianResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'physician_id' => $this->id,
            'user_id' => $this->user_id,
            'professional_name' => $this->professional_name,
            'certificates' => $this->certificates,
            'social_networks' => $this->social_networks,
            'biography' => $this->biography,
            'first_time_consultation' => $this->first_time_consultation,
            'subsequent_consultation' => $this->subsequent_consultation,
            'languages' => $this->languages,
            'is_verified' => $this->is_verified,
            'physician_specialties' => PhysicianSpecialtyResource::collection($this->physician_specialty),
            'physician_medical_services' => MedicalServicePhysicianResource::collection($this->medical_service_physician),
            // 'recipe_template' => $this->recipe_template,
            // 'user' => new UserResource($this->user),
        ];
    }
}
