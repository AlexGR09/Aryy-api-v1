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
            'first_time_consultation' => 'string|max:40',
            'subsequent_consultation' => 'string|max:40',
            'languages' => 'string|max:250',
            'medical_services' => 'array',
            'medical_services.*.medical_service_id' => 'required|numeric|distinct',
            'medical_services.*.price' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'first_time_consultation' => 'consulta por primera vez',
            'subsequent_consultation' => 'consulta posterior',
            'languages' => 'idiomas',
        ];
    }
}
