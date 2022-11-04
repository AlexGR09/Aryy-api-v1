<?php

namespace App\Http\Requests\Physician;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PhysicianRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // SE HACE ESTA CONSULTA YA QUE NO SE INSTANCIA EL MODELO PHYSICIAN EN EL CONTROLADOR
        $physician_id = DB::table('physicians')
            ->where('user_id', '=', auth()->user()->id)
            ->pluck('id')
            ->first();
        return [
            'professional_name' => 'required|max:50',
            'biography' => 'max:255',
            'recipe_template' => 'max:255',
            'certificates' => 'array',
            'social_networks' => 'array',
            'specialties' => 'required|array',
            'specialties.*.specialty_id' => 'required',
            'specialties.*.license' => 'required|distinct|'. Rule::unique('physician_specialty')->whereNot('physician_id', $physician_id),
            'specialties.*.institution' => 'required',

            // 'specialties.*.license' => 'required|distinct|'. Rule::unique('physician_specialty')->ignore($this->physician_specialty),

            // 'specialties.*.license' => 'required|distinct|'. Rule::unique('physician_specialty', 'license')->where(function($query) use ($physician){
            //     $query->whereNotIn('physician_id', $physician);
            //     return $query;
            // }),

        //     Rule::unique('deed_legalization_numbers', 'number')->where(function ($query) use ($deed_legalization_id) {
        //     $query->whereNotIn('id', $deed_legalization_id);
        //     return $query;
        // }),
            

            // 'shop.name' => 'unique:shops,name,' . $this->shop['id'],
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
