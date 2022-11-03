<?php

namespace App\Http\Requests\Physician;

use Illuminate\Foundation\Http\FormRequest;

class PhysicianSpecialtyRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

 
    public function rules()
    {
        return [
            'hola' => 'required'
        ];
    }
}
