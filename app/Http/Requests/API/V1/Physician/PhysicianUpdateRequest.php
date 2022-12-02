<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PhysicianUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules(Request $request)
    {
        // throw new \ErrorException($request->physician_id);
        return [
            'professional_name' => 'required|max:60',
            'biography' => 'max:255',
            'certificates' => 'array',
            'social_networks' => 'array',
            'specialties' => 'required|array',
            'specialties.*.specialty_id' => 'required|numeric',
            'specialties.*.license' => 'required|distinct|'. Rule::unique('physician_specialty')->whereNot('physician_id', $request->physician_id),
            'specialties.*.institution' => 'required',
            'certificates.*.route' => 'required|url',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2000|dimensions:max_width=512,max_height=512'
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
            'specialties.*.institution' => 'institución de la especialidad',
            'certificates.*.route' => 'ruta del certificado',
        ];
    }
}
