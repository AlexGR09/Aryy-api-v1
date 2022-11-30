<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class HereditaryBackgroundResource extends JsonResource
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
            'diabetes'=>json_decode($this->diabetes),
            'heart_diseases'=>json_decode($this->heart_diseases),
            'blood_pressure'=>json_decode($this->blood_pressure),
            'thyroid_diseases'=>json_decode($this->thyroid_diseases),
            'cancer'=>json_decode($this->cancer),
            'kidney_stones'=>json_decode($this->kidney_stones)
        ];
    }
}
