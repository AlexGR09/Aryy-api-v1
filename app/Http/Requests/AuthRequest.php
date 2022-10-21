<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (request()->is('api/login') ){
            return [
                'email' => 'required|email|max:35',
                'password' => 'required|min:8|max:16'
            ];  
        }
        return [
            'name' => 'required|min:8|max:40',
            'last_name' => 'required|min:4|max:60',
            'email' => ($this->getMethod() == 'POST') ? 'required|email|max:35|unique:users' : 'required|email|max:35|unique:users,email,'.auth()->user()->id,
            'password' => ($this->getMethod() == 'POST') ? 'required|min:8|max:16' : 'min:8|max:16'
         ];
        
    }

}