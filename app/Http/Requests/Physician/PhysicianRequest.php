<?php

namespace App\Http\Requests\Physician;

use Illuminate\Foundation\Http\FormRequest;

class PhysicianRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'professional_name' => 'required',
            'country_code' => 'required',
            'phone_number' => 'required',
            'c1_license' => 'required',
            'a1_license' => 'required',
            'city_id' => 'required'
        ];
    }
}
