<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhysicianCreateRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'professional_name' => 'required|max:60',
            'specialties' => 'required|array',
<<<<<<< HEAD
            'specialties.*.specialty_id' => 'required|numeric',
=======
            'specialties.*.specialty_id' => 'required|numeric|distinct',
>>>>>>> parent of 2668f6c (Merge branch 'main' of https://github.com/AlexGR09/Aryy-api-v1)
            'specialties.*.license' => 'required|distinct|'. Rule::unique('physician_specialty'),
            'specialties.*.institution' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'professional_name' => 'nombre profesional',
            'specialties.*.specialty_id' => 'id de la especialidad',
            'specialties.*.license' => 'licencia de la especialidad',
            'specialties.*.institution' => 'institución de la especialidad'
        ];
    }


}
