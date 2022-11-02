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
            'professional_name' => 'required|max:50',
            'biography' => 'max:255',
            'recipe_template' => 'max:255',
            'certificates' => 'required|json',
            'social_networks' => 'json'
        ];
    }

    public function attributes()
    {
        return [
            'professional_name' => 'nombre profesional',
            'biography' => 'biografía',
            'recipe_template' => 'plantilla de receta',
            'certificates' => 'certificado(s)',
            'social_networks' => 'redes sociales'
        ];
    }
}
