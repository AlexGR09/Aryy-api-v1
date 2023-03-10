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
            'patient_id' => 'required|exists:App\Models\Patient,id',
            'previous_surgeries' => 'nullable|string',
            'blood_transfusions' => 'nullable|string',
            'diabetes' => 'nullable|string',
            'heart_diseases' => 'nullable|string',
            'blood_pressure' => 'nullable|string',
            'thyroid_diseases' => 'nullable|string',
            'cancer' => 'nullable|string',
            'kidney_stones' => 'nullable|string',
            'hepatitis' => 'nullable|string',
            'trauma' => 'nullable|string',
            'respiratory_diseases' => 'nullable|string',
            'ets' => 'nullable|string',
            'gastrointestinal_pathologies' => 'nullable|string',
            'blood_diseases' => 'nullable|string',
        ];
    }
}
