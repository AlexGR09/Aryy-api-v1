<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class PerinatalBackgroundRequest extends FormRequest
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
            'last_menstrual_cycle' => 'nullable|date',
            'cycle_time' => 'nullable|string',
            'contraceptive_method_use' => 'nullable|string',
            'assisted_conception' => 'nullable|string',
            'final_ppf' => 'nullable|date',
        ];
    }
}
