<?php

namespace App\Http\Requests\API\Patient;

use Illuminate\Foundation\Http\FormRequest;

class StoreAllergyPatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'patient_id' => 'required|exists:App\Models\User,id',
            'food_allergy' => 'required',
            'drug_allergy' => 'required',
            'environmental_allergy' => 'required',
        ];
    }
}
