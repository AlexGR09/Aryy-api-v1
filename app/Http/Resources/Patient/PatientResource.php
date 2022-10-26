<?php

namespace App\Http\Resources\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'user_id'=>$this->user_id,
        ];
    }
}
