<?php

namespace App\Http\Resources\API\V1\Patient;

use App\Http\Resources\API\V1\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'patient_id'=>$this->id,
            'emergency_number' => $this->emergency_number,
            'id_card' => json_decode($this->id_card),
            'address' => json_decode($this->address),
            'zip_code' => $this->zip_code,
            'city_id' => $this->city_id,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
        ];
        
    }
}
