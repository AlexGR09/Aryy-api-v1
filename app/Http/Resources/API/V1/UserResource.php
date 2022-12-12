<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->id,
            'full_name' => $this->full_name,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'country_code' => $this->country_code,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'profile_photo' => $this->profile_photo,
            // 'user_folder' => $this->user_folder,
            // 'roles' => RoleResource::collection($this->roles)
        ];
    }
}
