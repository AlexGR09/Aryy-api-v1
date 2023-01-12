<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePyschologicalBackgroundRequest extends FormRequest
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
            'user_id' => 'required',
            'family_history' => 'sometimes|required',
            'disease_awareness' => 'sometimes|required',
            'areas_affected_by_the_disease' => 'sometimes|required',
            'family_support_group' => 'sometimes|required',
            'family_group_of_the_patient' => 'sometimes|required',
            'aspects_of_social_life' => 'sometimes|required',
            'aspects_of_working_life' => 'sometimes|required',
            'relationship_whit_authority' => 'sometimes|required',
            'inpulse_control' => 'sometimes|required',
            'frustration_management' => 'sometimes|required',
        ];
    }
}
