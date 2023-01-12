<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class StorePathologicalBackgroundRequest extends FormRequest
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
            'patient_id' => 'required',
            'previous_surgeries' => 'string',
            'blood_transfusions' => 'string',
            'diabetes' => 'string',
            'heart_diseases' => 'string',
            'blood_pressure' => 'string',
            'thyroid_diseases' => 'string',
            'cancer' => 'string',
            'kidney_stones' => 'string',
            'hepatitis' => 'string',
            'trauma' => 'string',
            'respiratory_diseases' => 'string',
            'ets' => 'string',
            'gastrointestinal_pathologies' => 'string',
        ];
    }
}
