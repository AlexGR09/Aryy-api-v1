<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public function toArray($request) {
        return [
            'role_id' => $this->id,
            'name' => $this->name,
            'permissions' => PermissionResource::collection($this->permissions),
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }

}