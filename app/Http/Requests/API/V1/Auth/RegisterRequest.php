<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'email|max:35|unique:users',
            'password' => 'required|confirmed|min:8|max:16',
            'type_user' => 'required|in:Patient,Physician',
            'country_code' => 'required|string|max:6',
            'phone_number' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }

    public function attributes()
    {
        return [
            'type_user' => 'tipo de usuario',
            'country_code' => 'código del país',
            'phone_number' => 'número de teléfono',
        ];
    }
}
