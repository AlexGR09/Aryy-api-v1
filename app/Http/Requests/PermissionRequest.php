<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'name' => ($this->getMethod() == 'POST') ? 'required|min:4|max:24|unique:permissions' : 'required|min:4|max:24|unique:permissions,name,'.$this->permission->id,
        ];
    }

}