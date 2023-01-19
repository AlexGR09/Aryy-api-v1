<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    {
        return [
            'patient_id' => $this->patient_id,
            'patient' => new PatientResource($this->patient),
            'height' => $this->height,
            'weight' => $this->weight,
            'imc' => $this->imc,
            'blood_type' => $this->blood_type,
            'allergy_patient_id' => $this->allergy_patient_id,
            'allergypatient' => new AllergyPatientResource($this->allergyPatient),
            'pathological_background_id' => $this->pathological_background_id,
            'pathological_background' => new PathologicalBackgroundResource($this->pathologicalBackground),
            'non_pathological_background_id' => $this->non_pathological_background_id,
            'non_pathological_background' => new NonPathologicalBackgroundResource($this->nonpathologicalbackground),
            'hereditary_background_id' => $this->hereditary_background_id,
            'hereditarybackground' => new HereditaryBackgroundResource($this->hereditarybackground),
            'vaccination_history_id' => $this->vaccination_history_id,
            'vaccinationhistory' => new VaccinationHistoryResource($this->vaccinationhistory),

        ];
    }
}
