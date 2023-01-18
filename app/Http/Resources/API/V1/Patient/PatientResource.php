<?php

namespace App\Http\Resources\API\V1\Patient;

use App\Http\Resources\API\V1\Catalogues\CityResource;
use App\Http\Resources\API\V1\Catalogues\OccupationResource;
use App\Http\Resources\API\V1\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'patient_id' => $this->id,
            'full_name' => $this->full_name,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'address' => $this->address,
            'zip_code' => $this->zip_code,
            'country_code' => $this->country_code,
            'emergency_number' => $this->emergency_number,
            'id_card' => $this->id_card,
            'city_id' => $this->city_id,
            'main_profile' => $this->main_profile,
            'occupations_patient' => OccupationResource::collection($this->occupations),
            'user_id' => $this->user_id,
            /*             'user' => new UserResource($this->user)
 */            // 'city' => new CityResource($this->city),
            // 'occupation_patient' => $this->occupationpatient,

        ];
    }
}
