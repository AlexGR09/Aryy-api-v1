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
            'medical_examination' => $this->medical_examination,
            'treatment' => $this->treatment,
            'laboratory_studies' => $this->laboratory_studies,
            'cabinet_studies' => $this->cabinet_studies,
        ];
    }
}
