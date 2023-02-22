<?php

namespace App\Http\Resources\API\V1\Physician;

use App\Http\Resources\API\V1\Patient\AllergyPatientResource;
use App\Http\Resources\API\V1\Patient\HereditaryBackgroundResource;
use App\Http\Resources\API\V1\Patient\NonPathologicalBackgroundResource;
use App\Http\Resources\API\V1\Patient\PathologicalBackgroundResource;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Http\Resources\API\V1\Patient\PosnatalBackgroundResource;
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
            'medical_history' => $this->id,
            'patient_id' => $this->patient_id,
            'patient' => new PatientResource($this->patient),
            'height' => $this->height,
            'weight' => $this->weight,
            'imc' => $this->imc,
            'blood_type' => $this->blood_type,
            /*allergy_patient*/
            'allergypatient' => new AllergyPatientResource($this->allergyPatient),
            /*pathological_background*/
            'pathological_background' => new PathologicalBackgroundResource($this->pathologicalBackground),
            /*non_pathological_background*/
            'non_pathological_background' => new NonPathologicalBackgroundResource($this->nonpathologicalbackground),
            /*hereditary_background*/
            'hereditarybackground' => new HereditaryBackgroundResource($this->hereditarybackground),
            /*gynecological_history*/
            'gynecological_history' => new GynecologicalHistoryResource($this->gynecological_history),
            /*pyschological_background*/
            'pyschological_history' => new PyschologicalBackgroundResource($this->pyschologicalBackground),
            /*perinatal_background*/
            'perinatal_background' => new PerinatalBackgroundResource($this->perinatalBackground),
            /*posnatal_background*/
            'posnatal_background' => new PosnatalBackgroundResource($this->postnatal_background),
        ];
    }
}
