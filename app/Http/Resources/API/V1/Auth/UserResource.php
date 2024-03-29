<?php

namespace App\Http\Resources\API\V1\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->id,
            'email' => $this->email,
            'country_code' => $this->country_code,
            'phone_number' => $this->phone_number,
            // 'user_folder' => $this->user_folder,
            // 'roles' => RoleResource::collection($this->roles)
        ];
    }
}
