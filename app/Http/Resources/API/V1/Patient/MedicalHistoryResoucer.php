<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\V1\Patient\AllergyPatientResoucer;
use App\Http\Resources\API\V1\UserResource;
use App\Http\Resources\API\V1\Patient\PathologicalBackgorundResoucer;
use App\Models\Patient;

class MedicalHistoryResoucer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'patient_id' => $this->patient_id,
            'patient'=>new PatientResource($this->patient),
            'height' => $this->height,
            'weight' => $this->weight,
            'imc' => $this->imc,
            'blood_type' => $this->blood_type,
            'allergy_patient_id' => $this->allergy_patient_id,
            'allergypatient' => new AllergyPatientResoucer($this->allergypatient),
            'pathological_background_id' => $this->pathological_background_id,
            'pathological_background' => new PathologicalBackgroundResoucer($this->pathologicalbackground),
            'non_pathological_background_id' => $this->non_pathological_background_id,
            'non_pathological_background' => new NonPathologicalBackgroundResoucer($this->nonpathologicalbackground),
            'hereditary_background_id' => $this->hereditary_background_id,
            'hereditarybackground' => new HereditaryBackgroundResoucer($this->hereditarybackground),
            'vaccination_history_id' => $this->vaccination_history_id,
            'vaccinationhistory' => new VaccinationHistoryResoucer($this->vaccinationhistory),



        ];
    }
}
