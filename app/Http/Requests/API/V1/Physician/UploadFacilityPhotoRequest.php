<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class UploadFacilityPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'facility_photo' => 'required',
            'facility_photo.*' => 'required|image|mimes:jpg,png|max:3000',
        ];
    }

    public function attributes()
    {
        return [
            'facility_photo' => 'array de fotos de la instalación',
            'facility_photo.*' => 'foto de la instalación',
        ];
    }
}
