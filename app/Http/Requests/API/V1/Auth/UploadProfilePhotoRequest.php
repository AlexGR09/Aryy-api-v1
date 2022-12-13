<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UploadProfilePhotoRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'photo' => 'required|image|mimes:jpg,png|max:2000|dimensions:max_width=512,max_height=512',
        ];
    }
}
