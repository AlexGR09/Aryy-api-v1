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
            'license_photo' => 'required|image|mimes:jpg,png|max:2000|dimensions:max_width=1024,max_height=1024',
        ];
    }

    public function attributes()
    {
        return [
            'license' => 'campo cédula',
            'license_photo' => 'foto de cédula'
        ];
    }
}
