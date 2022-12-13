<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class DiseaseIdRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'disease_id' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'disease_id' => 'id de la enfermedad',
        ];
    }
}
