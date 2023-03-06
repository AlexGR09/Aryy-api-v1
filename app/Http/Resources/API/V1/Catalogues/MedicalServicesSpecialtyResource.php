<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalServicesSpecialtyResource extends JsonResource
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
            'Medical_services_specialty_id' => $this->id,
            'specialty_name' => SpecialtyResource::collection($this->specialty),
            'medical_service_name'=>MedicalServiceResource::collection($this->medicalServices),
        ];
    }
}
