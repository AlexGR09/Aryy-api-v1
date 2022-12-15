<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class TaxDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'rfc'=>'required|min:12|max:13',
            'taxpayer_name'=>'required',
            'tax_regime'=>'required',
            'tax_email'=>'required|email',
            'tax_residence'=>'required',
            'constancy'=>'required|image|mimes:jpg,png|max:3000',
        ];
    }
    public function attributes()
    {
        return [
            'constancy'=>'Foto de la constancia de situacion fiscal',
        ];
    }
}
