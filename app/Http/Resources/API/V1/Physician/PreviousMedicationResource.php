<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class PreviousMedicationResource extends JsonResource
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
            'id' => $this->id,
            'previus medication' => explode(",",$this->previous_medication),
        ];
    }
}
