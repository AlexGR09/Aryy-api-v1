<?php

namespace App\Http\Resources\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class HealthInsuranceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'insurance_number' => $this->insurance_number,
            'insurances_id' => $this->insurances_id,
        ];
    }
}
