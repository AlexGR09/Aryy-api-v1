<?php

namespace App\Http\Requests\API\V1\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'full_name'=>'required',
            'gender'=>'required',
            'birthday'=>'required|date',
/*             'address' => 'required|max:255',
            'zip_code' => 'required|digits:5', */
            'emergency_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'/* .  Rule::unique('patients') */,
            'city_id' => 'required|numeric',
            'id_card' => 'required_array_keys:type,image',
            'id_card.type' => 'max:50',
            'id_card.image' => 'image|mimes:jpg,jpeg,png|max:2000|dimensions:max_width=512,max_height=512',
        ];
    }
}
