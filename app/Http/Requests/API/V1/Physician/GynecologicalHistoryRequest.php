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
            'first_menstruation' => 'nullable|date',
            'last_menstruation' => 'nullable|date',
            'bleeding' => 'nullable|string',
            'pain' => 'nullable|string',
            'intimate_hygiene' => 'nullable|string',
            'cervical_discharge' => 'nullable|string',
            'sex' => 'nullable|string',
            'pregnancies' => 'nullable|string',
            'cervical_cancer' => 'nullable|string',
            'breast_cancer' => 'nullable|string',
            'sexually_active' => 'nullable|string',
            'family_planning' => 'nullable|string',
            'hormone_replacement_therapy' => 'nullable|string',
            'last_pap_smear' => 'nullable|date',
            'last_mammography' => 'nullable|date',
        ];
    }
}
