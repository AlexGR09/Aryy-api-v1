<?php

namespace App\Http\Resources\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'user_id'=>$this->user_id,
            'health_insurance_id'=>$this->health_insurance_id,
            'medical_history_id'=>$this->medical_history_id,
            'medical_record_id'=>$this->medical_record_id
        ];
        
    }
}
