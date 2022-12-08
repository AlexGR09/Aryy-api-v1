<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalServiceResource extends JsonResource
{
<<<<<<< HEAD
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
=======

    public function toArray($request)
    {
        return [
            'medical_service_id' => $this->id,
>>>>>>> parent of 2668f6c (Merge branch 'main' of https://github.com/AlexGR09/Aryy-api-v1)
            'name' => $this->name
        ];
    }
}
