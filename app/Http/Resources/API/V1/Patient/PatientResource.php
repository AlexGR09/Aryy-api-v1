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
            'id_card' => json_decode($this->id_card),
            'address' => json_decode($this->address),
            'zip_code' => $this->zip_code,
            'city_id' => $this->city_id,
            'code_country' => $this->country_code,
            'city' => new CityResource($this->city),
            /* 'health_insurance_id' => $this->health_insurance_id,
            'health_insurance' => new HealthInsuranceResource($this->health_insurance),
            'medical_history_id' => $this->medical_history_id,
            'medical_record_id' => $this->medical_record_id, */
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'occupation_patient'=> $this->occupationpatient,
            
        ];
        
    }
}
