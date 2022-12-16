<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class OccupationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    {
        return [
            'occupation_id' => $this->id,
            'name' => $this->name,
        ];
    }
}
