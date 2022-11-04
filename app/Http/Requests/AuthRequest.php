<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        if (request()->is('api/v1/login')) {
            return [
                'email' => 'required|email|max:35',
                'password' => 'required|min:8|max:16'
            ];
        }

        if (request()->is('api/v1/register')) {
            return [
                'email' => 'required|email|max:35|unique:users',
                'password' => 'required|min:8|max:16',
                'code_country' => (!$request->mobile) ? 'required|max:6' : '',
                'phone_number' => (!$request->mobile) ? 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10' : '' 
            ];
        }

        if (request()->is('api/v1/profile')) {
            return [
                'name' => 'required|max:40',
                'last_name' => 'required|max:40',
                'gender' => 'required|'. Rule::in(['Masculino','Femenino']),
                'birthday' => 'required|date',
                'email' => 'required|email|max:35|'. Rule::unique('users')->ignore(auth()->user()),
                'password' => 'min:8|max:16',
                'code_country' =>  'required|max:6',
                'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'. Rule::unique('users')->ignore(auth()->user()), 
                'photo' => 'image|mimes:jpg,jpeg,png|max:2000|dimensions:max_width=512,max_height=512'
            ];
        }
    }

    public function attributes()
    {
        return [
            'code_country' => 'código del país',
            'phone_number' => 'número de teléfono',
            'birthday' => 'fecha de nacimiento'
        ];
    }

}