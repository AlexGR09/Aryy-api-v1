<?php

namespace App\Http\Requests\API\V1\Patient;

use Illuminate\Foundation\Http\FormRequest;

class NonPathologicalBackgroundRequest extends FormRequest
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
            /* 'physical_activity',
            'rest_time',
            'smoking',
            'alcoholim',
            'other_substances', */
            'diet' => 'string',
            'drug_active' => 'string',
            'previous_medication' => 'string'
        ];
    }
}
