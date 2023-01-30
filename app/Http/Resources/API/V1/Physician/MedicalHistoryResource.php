<?php

namespace App\Http\Resources\API\V1\Physician;

use App\Http\Resources\API\V1\Patient\AllergyPatientResource;
use App\Http\Resources\API\V1\Patient\HereditaryBackgroundResource;
use App\Http\Resources\API\V1\Patient\NonPathologicalBackgroundResource;
use App\Http\Resources\API\V1\Patient\PathologicalBackgroundResource;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Http\Resources\API\V1\Patient\VaccinationHistoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalHistoryResource extends JsonResource
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
            'gynecological_history_id'=>$this->gynecological_history_id,
            'gynecological_history' => new GynecologicalHistoryResource($this->ObgynBackground),
            'pyschological_background_id' => $this->pyschological_background_id,
            'pyschological_history' => new PyschologicalBackgroundResource($this->pyschologicalBackground),
            'perinatal_background_id' => $this->perinatal_background_id,
            'perinatal_background' => new PerinatalBackgroundResource($this->perinatalBackground),
            'posnatal_background_id' =>$this->posnatal_background_id,
            'posnatal_background'=>new PerinatalBackgroundResource($this->postnatal_background),
        ];
    }
}
