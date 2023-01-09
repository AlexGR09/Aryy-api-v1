<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerinatalBackgroundRequest extends FormRequest
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
            'user_id' => 'required',
            'last_menstrual_cycle' => 'sometimes|required',
            'cycle_time' => 'sometimes|required',
            'contraceptive_method_use' => 'sometimes|required',
            'assisted_conception' => 'sometimes|required',
            'final_ppf' => 'sometimes|required',
        ];
    }
}
