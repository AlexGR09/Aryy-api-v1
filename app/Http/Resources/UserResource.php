<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'bithday' => $this->bithday,
            'code_country' => $this->code_country,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'photo' => $this->photo,
            'roles' => RoleResource::collection($this->roles)
        ];
    }
}
