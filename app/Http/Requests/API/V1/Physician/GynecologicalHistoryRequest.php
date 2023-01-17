<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class GynecologicalHistoryRequest extends FormRequest
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
           'first_menstruation',
           'last_menstruation',
           'bleeding',
           'pain',
           'intimate_hygiene',
           'cervical_discharge',
           'sex',
           'pregnancies',
           'cervical_cancer',
           'breast_cancer',
           'sexually_active',
           'family_planning',
           'hormone_replacement_therapy',
           'last_pap_smear',
           'last_mammography'
        ];
    }
}