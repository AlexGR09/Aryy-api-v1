<?php

namespace App\Http\Resources\API\V1\Patient;

use App\Http\Resources\API\V1\Catalogues\CityResource;
use App\Http\Resources\API\V1\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\V1\Patient\OccupationPatientResource;

class PatientResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'patient_id'=>$this->id,
            'emergency_number' => $this->emergency_number,
            /* 'id_card' => $this->id_card,
            'address' => $this->address,
            'zip_code' => $this->zip_code, */
            'city_id' => $this->city_id,
            'code_country' => $this->country_code,
            'city' => new CityResource($this->city),
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'occupation_patient'=> $this->occupationpatient,
            
        ];
        
    }
}
