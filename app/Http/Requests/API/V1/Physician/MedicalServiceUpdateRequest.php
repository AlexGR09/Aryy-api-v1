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
            'first_time_consultation' => 'required|string|max:40',
            'subsequent_consultation' => 'required|string|max:40',
            'languages' => 'required|string|max:250'
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
