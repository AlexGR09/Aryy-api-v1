<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxDataResource extends JsonResource
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
            'physician_id' => $this->physician_id,
            'physician' => new PhysicianResource($this->physician),
            'rfc' => $this->rfc,
            'taxpayer_name' => $this->taxpayer_name,
            'tax_regime' => $this->tax_regime,
            'tax_email' => $this->tax_email,
            'tax_residence' => $this->tax_residence,
            'constancy' => $this->constancy,
        ];
    }
}
