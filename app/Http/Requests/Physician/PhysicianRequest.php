<?php

namespace App\Http\Requests\Physician;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhysicianRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // $this->array = json_encode($this->array);
        return [
            'professional_name' => 'required|max:50',
            'biography' => 'max:255',
            'recipe_template' => 'max:255',
            'certificates' => 'required|array',
            'social_networks' => 'array',
            'specialties' => 'required|array',
            'specialties.*.specialty_id' => 'required',
            'specialties.*.license' => 'required|distinct|'. Rule::unique('physician_specialty'),
            'specialties.*.institution' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'professional_name' => 'nombre profesional',
            'biography' => 'biografía',
            'recipe_template' => 'plantilla de receta',
            'certificates' => 'certificado(s)',
            'social_networks' => 'redes sociales',
            'specialties.*.specialty_id' => 'id de la especialidad',
            'specialties.*.license' => 'licencia de la especialidad',
            'specialties.*.institution' => 'institución de la especialidad'
        ];
    }
}
