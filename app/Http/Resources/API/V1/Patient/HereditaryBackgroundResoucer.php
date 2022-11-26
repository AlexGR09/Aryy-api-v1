<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class HereditaryBackgroundResoucer extends JsonResource
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
            'diabetes'=>$this->diabetes,
            'heart_diseases'=>$this->heart_diseases,
            'blood_pressure'=>$this->blood_pressure,
            'thyroid_diseases'=>$this->thyroid_diseases,
            'cancer'=>$this->cancer,
            'kidney_stones'=>$this->kidney_stones
        ];
    }
}
