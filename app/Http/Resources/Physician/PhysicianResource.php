<?php

namespace App\Http\Resources\Physician;

use App\Http\Resources\UserResource;
use App\Models\PhysicianSpecialty;
use Illuminate\Http\Resources\Json\JsonResource;

class PhysicianResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'physician_id' => $this->id,
            'professional_name' => $this->professional_name,
            'certificates' => json_decode($this->certificates),
            'social_networks' => json_decode($this->social_networks),
            'biography' => $this->biography,
            'recipe_template' => $this->recipe_template,
            'is_verified' => $this->is_verified,
            // 'physician_specialties' => PhysicianSpecialty::where('physician_id', $this->id)->get(),
            'physician_specialties' => PhysicianSpecialtyResource::collection($this->psychologist_specialties),
            'user' => new UserResource($this->user),
        ];
    }
}
