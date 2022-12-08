<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class DiseaseResource extends JsonResource
{
<<<<<<< HEAD
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
=======

>>>>>>> parent of 2668f6c (Merge branch 'main' of https://github.com/AlexGR09/Aryy-api-v1)
    public function toArray($request)
    {
        return [
            'disease_id' => $this->id,
            'name' => $this->name,
        ];
    }
}
