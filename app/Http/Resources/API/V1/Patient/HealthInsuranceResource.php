<?php

namespace App\Http\Resources\API\V1\Patient;

use App\Http\Resources\API\V1\Catalogues\InsuranceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HealthInsuranceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'insurance_number' => $this->insurance_number,
            'insurance_id' => $this->insurance_id,
            'insurance' => new InsuranceResource($this->insurance),
            // 'user' => new UserResource($this->user),
        ];
    }
}
