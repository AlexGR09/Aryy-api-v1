<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePyschologicalBackgroundRequest extends FormRequest
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
     * @return array<string => 'required', mixed>
     */
    public function rules()
    {
        return [
            'family_history' => 'string',
            'disease_awareness' => 'string',
            'areas_affected_by_the_disease' => 'string',
            'family_support_group' => 'string',
            'family_group_of_the_patient' => 'string',
            'aspects_of_social_life' => 'string',
            'aspects_of_working_life' => 'string',
            'relationship_whit_authority' => 'string',
            'inpulse_control' => 'string',
            'frustration_management' => 'string',
        ];
    }
}
