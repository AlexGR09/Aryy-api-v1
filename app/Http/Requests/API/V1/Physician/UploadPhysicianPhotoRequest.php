<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhysicianPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'physician_photo' => 'required',
            'physician_photo.*' => 'required|image|mimes:jpg,png|max:3000',
        ];
    }

    public function attributes()
    {
        return [
            'physician_photo' => 'array de fotos del médico',
            'physician_photo.*' => 'foto del médico',
        ];
    }
}
