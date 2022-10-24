<?php

namespace App\Http\Requests\Catalogues;

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
            'name' => 'required|max:32'
        ];
    }
}
