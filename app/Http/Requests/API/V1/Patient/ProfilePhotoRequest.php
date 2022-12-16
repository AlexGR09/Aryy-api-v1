<?php

namespace App\Http\Requests\API\V1\Patient;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePhotoRequest extends FormRequest
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
