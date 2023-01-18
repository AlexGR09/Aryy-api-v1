<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class UploadLogoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'logo' => 'required|mimes:jpg,png,pdf|max:5000',
        ];
    }

    public function attributes()
    {
        return [
            'logo' => 'logotipo',
        ];
    }
}
