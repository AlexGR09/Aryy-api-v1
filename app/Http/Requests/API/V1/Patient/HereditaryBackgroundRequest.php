<?php

namespace App\Http\Requests\API\V1\Patient;

use Illuminate\Foundation\Http\FormRequest;

class HereditaryBackgroundRequest extends FormRequest
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
            /* 'diabetes'=>'string',
            'heart_diseases'=>'string',
            'blood_pressure'=>'string',
            'thyroid_diseases'=>'string',
            'cancer'=>'string',
            'kidney_stones'=>'string' */
        ];
    }
}
