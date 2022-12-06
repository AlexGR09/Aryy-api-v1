<?php

namespace App\Http\Requests\API\V1\Catalogues;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:32',
            'state_id' => 'required',
        ];
    }
}
