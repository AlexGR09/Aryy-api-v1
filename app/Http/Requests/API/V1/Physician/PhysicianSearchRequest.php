<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class PhysicianSearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search' => 'nullable|string',
            'city' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'search' => 'valor de la búsqueda',
            'city' => 'el ID de la ciudad',
        ];
    }
}
