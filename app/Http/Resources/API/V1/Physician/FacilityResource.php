<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'extension' => $this->extension,
            'attetion_time' => $this->attetion_time,
            'zipcode' => $this->zipcode,
            'state' => $this->state,
            'city' => $this->city,
            'town' => $this->town,
            'street' => $this->street,
            'exterior_no' => $this->exterior_no,
            'interior_no' => $this->interior_no,
            'references' => $this->references,
            'accesibility' => $this->accesibility,
            'public_target' => $this->public_target,
            'services' => $this->services,
        ];
    }
}
