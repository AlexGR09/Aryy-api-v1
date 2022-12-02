<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\V1\Patient\OccupationResoucer;


class OccupationPatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        [
            'occupation_id'=>$this->occupation_id,
            'patient_id'=>$this->patient_id,
            
        
        ];
    }
}
