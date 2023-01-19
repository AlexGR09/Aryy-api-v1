<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePathologicalBackgroundRequest extends FormRequest
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
            'previous_surgeries' => 'sometimes|string',
            'blood_transfusions' => 'sometimes|string',
            'diabetes' => 'sometimes|string',
            'heart_diseases' => 'sometimes|string',
            'blood_pressure' => 'sometimes|string',
            'thyroid_diseases' => 'sometimes|string',
            'cancer' => 'sometimes|string',
            'kidney_stones' => 'sometimes|string',
            'hepatitis' => 'sometimes|string',
            'trauma' => 'sometimes|string',
            'respiratory_diseases' => 'sometimes|string',
            'ets' => 'sometimes|string',
            'gastrointestinal_pathologies' => 'sometimes|string',
            'blood_disease' => 'sometimes|string'
        ];
    }
}
