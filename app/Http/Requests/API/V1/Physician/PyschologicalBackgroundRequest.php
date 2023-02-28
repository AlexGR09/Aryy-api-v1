<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class PyschologicalBackgroundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'family_history' => 'nullable|string',
            'disease_awareness' => 'nullable|string',
            'areas_affected_by_the_disease' => 'nullable|string',
            'family_support_group' => 'nullable|string',
            'family_group_of_the_patient' => 'nullable|string',
            'aspects_of_social_life' => 'nullable|string',
            'aspects_of_working_life' => 'nullable|string',
            'relationship_whit_authority' => 'nullable|string',
            'inpulse_control' => 'string',
            'frustration_management' => 'nullable|string',
        ];
    }
}
