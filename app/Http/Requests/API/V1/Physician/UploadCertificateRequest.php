<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class UploadCertificateRequest extends FormRequest
{
    
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'certificate_photo' => 'required|array',
            'certificate_photo.*' => 'required|image|mimes:jpg,png|max:2000',
        ];
    }

    public function attributes()
    {
        return [
            'certificate_photo' => 'array de fotos de certificados',
            'license_photo.*' => 'foto de certificado'
        ];
    }
}
