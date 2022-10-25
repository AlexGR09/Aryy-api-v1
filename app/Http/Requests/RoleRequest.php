<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ($this->getMethod() == 'POST') ? 'required|min:4|max:24|unique:roles' : 'required|min:4|max:24|unique:roles,name,'.$this->role->id,
        ];
    }
}
