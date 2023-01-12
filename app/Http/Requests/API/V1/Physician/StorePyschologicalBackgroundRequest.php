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
            'user_id' => 'required',
            'family_history' => 'required',
            'disease_awareness' => 'required',
            'areas_affected_by_the_disease' => 'required',
            'family_support_group' => 'required',
            'family_group_of_the_patient' => 'required',
            'aspects_of_social_life' => 'required',
            'aspects_of_working_life' => 'required',
            'relationship_whit_authority' => 'required',
            'inpulse_control' => 'required',
            'frustration_management' => 'required',
        ];
    }
}
