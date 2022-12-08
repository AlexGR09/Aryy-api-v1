<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class UploadLicenseRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'license' => 'required|string|max:200|exists:physician_specialty',
<<<<<<< HEAD
            'license_photo' => 'required|image|mimes:jpg,png|max:2000',
=======
            'photo' => 'required|image|mimes:jpg,png|max:2000',
>>>>>>> parent of 2668f6c (Merge branch 'main' of https://github.com/AlexGR09/Aryy-api-v1)
        ];
    }

    public function attributes()
    {
        return [
            'license' => 'campo cédula',
<<<<<<< HEAD
            'license_photo' => 'foto de cédula'
=======
            'photo' => 'foto de cédula'
>>>>>>> parent of 2668f6c (Merge branch 'main' of https://github.com/AlexGR09/Aryy-api-v1)
        ];
    }
}
