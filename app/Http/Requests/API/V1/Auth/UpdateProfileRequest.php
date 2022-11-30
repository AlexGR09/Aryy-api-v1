<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|max:40',
            'last_name' => 'required|max:40',
            'gender' => 'required|in:masculino,femenino',
            'birthday' => 'required|date',
            'email' => 'required|email|max:35|'. Rule::unique('users')->ignore(auth()->user()),
            'password' => 'confirmed|min:8|max:16',
            'country_code' =>  'required|max:6',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'. Rule::unique('users')->ignore(auth()->user()), 
            // 'photo' => 'image|mimes:jpg,jpeg,png|max:2000|dimensions:max_width=512,max_height=512'
        ];
    }

    public function attributes()
    {
        return [
            'birthday' => 'fecha de nacimiento',
            'country_code' => 'código del país',
            'phone_number' => 'número de teléfono'
        ];
    }
}
