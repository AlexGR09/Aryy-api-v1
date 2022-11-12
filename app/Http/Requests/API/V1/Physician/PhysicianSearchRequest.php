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
            'search' => 'required|string',
            'value' => 'required|string',
            'city_id' => 'numeric'
        ];
    }

    public function attributes()
    {
        return [
            'value' => 'valor de la búsqueda',
            'city_id' => 'el ID de la ciudad'
        ];
    }
}
