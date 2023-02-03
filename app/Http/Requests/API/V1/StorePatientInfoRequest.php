<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone_number' => 'required',
            'full_name' => 'required',
            'birthday' => 'required',
            'blood_type' => 'required',
            'height' => 'required',
            'gender' => 'required|in:Masculino,Femenino',
        ];
    }
}
