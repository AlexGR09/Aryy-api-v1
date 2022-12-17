<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            /* 'email' => 'required|email|max:35', */
            'password' => 'required|min:8|max:16',
        ];
    }
}
