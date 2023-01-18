<?php

namespace App\Http\Requests\API\V2\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'city_id' => 'required|exists:cities,id',
            'occupation_id' => 'required|exists:occupations,id',
            'full_name' => 'required|string|max:120',
            'gender' => 'required|in:masculino,femenino',
            'birthday' => 'required|date',
            'country_code' => 'nullable|string|max:6',
            'emergency_number' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'.Rule::unique('patients'),
        ];
    }
}
