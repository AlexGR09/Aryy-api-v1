<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'vital_signs' => 'array|present',
            'vital_signs.temperature' => 'string|nullable',
            'vital_signs.weight' => 'string|nullable',
            'vital_signs.breathing_frecuncy' => 'string|nullable',
            'vital_signs.systolic_pressure' => 'string|nullable',
            'vital_signs.diasystolic_pressure' => 'string|nullable',
            'vital_signs.heart_rate' => 'string|nullable',
            'vital_signs.oxygen_saturation' => 'string|nullable',
            'vital_signs.body_mass' => 'string|nullable',
            'vital_signs.body_fat' => 'string|nullable',
            'vital_signs.weight_loss' => 'string|nullable',
            'vital_signs.fat' => 'string|nullable',
            'vital_signs.waist' => 'string|nullable',
            'vital_signs.water' => 'string|nullable',
            'vital_signs.muscle' => 'string|nullable',
            'vital_signs.abdomen' => 'string|nullable',

            'prescription' => 'array|present',
            'prescription.symptom' => 'string|required',
            'prescription.diagnosis' => 'string|required',
            'prescription.treatment' => 'array|required',
            'prescription.treatment.brand' => 'string|required',
            'prescription.treatment.drug_name' => 'string|required',
            'prescription.treatment.presentation' => 'string|required',
            'prescription.medication_instructions' => 'string|required',
            'prescription.medical_examination' => 'string|nullable',
            'prescription.laboratory_order' => 'string|nullable',
        ];
    }
}
