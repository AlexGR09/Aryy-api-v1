<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class KidneyStoneResource extends JsonResource
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
            'kidney_stone_id' => $this->id,
            'name' => $this->name,
        ];
    }
}
