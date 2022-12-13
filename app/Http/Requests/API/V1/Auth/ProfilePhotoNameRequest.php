<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePhotoNameRequest extends FormRequest
{
    
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'photo' => 'required|string'
        ];
    }
}
