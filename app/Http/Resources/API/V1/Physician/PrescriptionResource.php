<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'prescription_id' => $this->id,
            'vital_sign_id' => $this->vital_sign_id,
            'symptom' => $this->symptom,
            'diagnosis' => $this->diagnosis,
            'treatment' => $this->treatment,
            'medication_instructions' => $this->medication_instructions,
            'medical_examination' => $this->medical_examination,
        ];
    }
}
