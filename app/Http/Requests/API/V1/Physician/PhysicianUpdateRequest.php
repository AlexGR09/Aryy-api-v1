<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PhysicianUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        // SE HACE ESTA CONSULTA YA QUE NO SE INSTANCIA EL MODELO PHYSICIAN EN EL REQUEST DEL CONTROLADOR
        $physician_id = DB::table('physicians')
            ->where('user_id', '=', auth()->user()->id)
            ->pluck('id')
            ->first();

        return [
            'professional_name' => 'required|max:60',
            'biography' => 'max:255',
            'social_networks' => 'array:facebook,instagram,tiktok,youtube,website',
            'social_networks.*' => 'url',
            'specialties' => 'required|array',
            'specialties.*.specialty_id' => 'required|numeric',
            'specialties.*.license' => 'required|distinct|'. Rule::unique('physician_specialty')->whereNot('physician_id', $physician_id),
            'specialties.*.institution' => 'required',
            // 'social_networks.*' => 'required'
            // 'certificates.*.filename' => 'required',
            // 'photo' => 'image|mimes:jpg,jpeg,png|max:2000|dimensions:max_width=512,max_height=512'
        ];
    }

    public function attributes()
    {
        return [
            'professional_name' => 'nombre profesional',
            'biography' => 'biografía',
            'social_networks' => 'redes sociales',
            'social_networks.*' => 'url de la red social',
            'specialties.*.specialty_id' => 'id de la especialidad',
            'specialties.*.license' => 'licencia de la especialidad',
            'specialties.*.institution' => 'institución de la especialidad',
            // 'certificates.*.filename' => 'nombre del archivo certificado',
        ];
    }

}
