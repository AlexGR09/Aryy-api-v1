<?php

namespace App\Http\Requests\API\V1\Patient;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAllergyPatientRequest extends FormRequest
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
            'food_allergy' => 'nullable|array|min:1',
            'food_allergy.*' => 'nullable|string',
            'drug_allergy' => 'nullable|array|min:1',
            'drug_allergy.*' => 'nullable|string',
            'environmental_allergy' => 'nullable|array|min:1',
            'environmental_allergy.*' => 'nullable|string',
        ];
    }
}
