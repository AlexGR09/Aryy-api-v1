<?php

namespace App\Http\Requests\API\V1\Physician;

use App\Models\Physician;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhysicianUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $physician = Physician::where('user_id', auth()->user()->id)->firstOrFail();

        return [
            'professional_name' => 'required|max:60',
            'biography' => 'max:255',
            'social_networks' => 'array:facebook,instagram,tiktok,youtube,website',
            'gender' => 'nullable|in:masculino,femenino',
            'social_networks.*' => 'url',
            'specialties' => 'required|array',
            'specialties.*.specialty_id' => 'required|numeric|distinct',
            'specialties.*.license' => 'required|distinct|'.Rule::unique('physician_specialty')->whereNot('physician_id', $physician->id),
            'specialties.*.institution' => 'required',
            'specialties.*.license_photo' => 'present|exists:physician_specialty,license_photo',
        ];
    }

    public function attributes()
    {
        return [
            'professional_name' => 'nombre profesional',
            'biography' => 'biografía',
            'social_networks' => 'redes sociales',
            'social_networks.*' => 'url de la red social',
            'gender' => 'género',
            'specialties.*.specialty_id' => 'id de la especialidad',
            'specialties.*.license' => 'licencia de la especialidad',
            'specialties.*.institution' => 'institución de la especialidad',
            'specialties.*.license_photo' => 'foto de la especialidad',
        ];
    }
}
