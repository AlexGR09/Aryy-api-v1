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
           'first_menstruation'=>'date',
           'last_menstruation'=>'date',
           'bleeding'=>'string',
           'pain'=>'string',
           'intimate_hygiene'=>'string',
           'cervical_discharge'=>'string',
           'sex'=>'string',
           'pregnancies'=>'string',
           'cervical_cancer'=>'string',
           'breast_cancer'=>'string',
           'sexually_active'=>'string',
           'family_planning'=>'string',
           'hormone_replacement_therapy'=>'string',
           'last_pap_smear'=>'date',
           'last_mammography'=>'date'
        ];
    }
}