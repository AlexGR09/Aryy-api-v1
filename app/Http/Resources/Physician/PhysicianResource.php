<?php

namespace App\Http\Resources\Physician;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PhysicianResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'physician_id' => $this->id,
            'user_id' => $this->user_id,
            'professional_name' => $this->professional_name,
            'country_code' => $this->country_code,
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'c1_license' => $this->c1_license,
            'a1_license' => $this->a1_license,
            'city_id' => $this->city_id,
            // 'user' => $this->city_id,
            'user' => new UserResource($this->user),
            // 'user' => UserResource::collection($this->whenLoaded('user')),
            // 'posts' => PostResource::collection($this->posts),
            
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
