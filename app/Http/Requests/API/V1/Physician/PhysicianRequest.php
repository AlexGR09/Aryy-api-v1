<?php

namespace App\Http\Requests\API\V1\Physician;

use App\Models\Physician;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PhysicianRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        // SE HACE ESTA CONSULTA YA QUE NO SE INSTANCIA EL MODELO PHYSICIAN EN EL REQUEST DEL CONTROLADOR
        $physician = Physician::where('user_id', auth()->user()->id)->firstOrFail();
        // $physician_id = DB::table('physicians')
        //     ->where('user_id', '=', auth()->user()->id)
        //     ->pluck('id')
        //     ->firstOrFail();
        return [
            'professional_name' => 'required|max:50',
            'biography' => 'max:255',
            'recipe_template' => 'max:255',
            'certificates' => 'array',
            'social_networks' => 'array',
            'specialties' => 'required|array',
            'specialties.*.specialty_id' => 'required|numeric',
            'specialties.*.license' => 'required|distinct|'.Rule::unique('physician_specialty')->whereNot('physician_id', $physician->id),
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
            'specialties.*.institution' => 'institución de la especialidad',
        ];
    }
}
