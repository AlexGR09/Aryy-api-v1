<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'email' => 'required|email|max:35|'.Rule::unique('users')->ignore(auth()->user()),
            'password' => 'confirmed|min:8|max:16',
            'country_code' => 'required|max:6',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'.Rule::unique('users')->ignore(auth()->user()),
        ];
    }

    public function attributes()
    {
        return [
            'country_code' => 'código del país',
            'phone_number' => 'número de teléfono',
        ];
    }
}
