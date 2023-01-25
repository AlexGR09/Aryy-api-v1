<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class FavoritePhysicianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'physician_id' => $this->id,
            'user_id' => $this->user_id,
            'professional_name' => $this->professional_name,
            'specialty' => $this->specialty,
        ];
    }
}
