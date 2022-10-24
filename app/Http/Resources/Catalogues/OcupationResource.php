<?php

namespace App\Http\Resources\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class OcupationResource extends JsonResource
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
            'name' => $this->name
        ];
    }
}
