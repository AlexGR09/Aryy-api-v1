<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class MedicalServiceUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'languages' => 'string|max:250',
            'medical_services' => 'array',
            'medical_services.*.id' => 'required|numeric|distinct',
            'medical_services.*.price' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'languages' => 'idiomas',
        ];
    }
}
