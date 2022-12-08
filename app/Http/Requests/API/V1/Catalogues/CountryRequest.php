<?php

namespace App\Http\Requests\API\V1\Catalogues;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ($this->getMethod() == 'POST') ? 'required|max:32|unique:countries' : 'required|max:32|unique:countries,name,'.$this->country->id,
        ];
    }
}
