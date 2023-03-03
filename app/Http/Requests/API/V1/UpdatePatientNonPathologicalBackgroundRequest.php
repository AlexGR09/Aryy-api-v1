<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientNonPathologicalBackgroundRequest extends FormRequest
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
            'physical_activity' => 'sometimes',
            'rest_time' => 'sometimes',
            'smoking' => 'sometimes',
            'alcoholim' => 'sometimes',
            'other_substances' => 'sometimes',
            'diet' => 'sometimes',
            'drug_active' => 'sometimes',
            'previous_medication' => 'sometimes',
        ];
    }
}
