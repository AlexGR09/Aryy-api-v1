<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientHereditaryBackgroundRequest extends FormRequest
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
     * @return array<string => 'sometimes', mixed>
     */
    public function rules()
    {
        return [
            'diabetes' => 'sometimes',
            'heart_diseases' => 'sometimes',
            'blood_pressure' => 'sometimes',
            'thyroid_diseases' => 'sometimes',
            'cancer' => 'sometimes',
            'kidney_stones' => 'sometimes',
            'blood_diseases' => 'sometimes',
        ];
    }
}
