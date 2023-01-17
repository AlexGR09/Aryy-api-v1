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
            'last_menstrual_cycle'=>'date',
            'cycle_time'=>'string',
            'contraceptive_method_use'=>'string',
            'assisted_conception'=>'string',
            'final_ppf'=>'date',
        ];
    }
}
