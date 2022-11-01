<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        if (request()->is('api/login')) {
            return [
                'email' => 'required|email|max:35',
                'password' => 'required|min:8|max:16'
            ];
        }
        return [
            // 'name' => 'required|max:40',
            // 'last_name' => 'required|min:1|max:60',
            'email' => ($this->getMethod() == 'POST') ? 'required|email|max:35|unique:users' : 'required|email|max:35|unique:users,email,'.auth()->user()->id,
            'password' => ($this->getMethod() == 'POST') ? 'required|min:8|max:16' : 'min:8|max:16',
            'code_country' => (!$request->mobile) ? 'required|max:6' : '',
            'phone_number' => (!$request->mobile) ? 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10' : '' 
        ];
    }

    public function attributes()
    {
        return [
            'code_country' => 'código del país',
            'phone_number' => 'número de teléfono'
        ];
    }

}