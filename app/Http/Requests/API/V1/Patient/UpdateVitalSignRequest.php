<?php

namespace App\Http\Requests\API\Patient;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVitalSignRequest extends FormRequest
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
            'user_id' => 'required|exists:App\Models\User,id',
            'temperature' => 'sometimes|required',
            'weight' => 'sometimes|required',
            'breathing_frecuncy' => 'sometimes|required',
            'systolic_pressure' => 'sometimes|required',
            'diasystolic_pressure' => 'sometimes|required',
            'heart_rate' => 'sometimes|required',
            'oxygen_saturation' => 'sometimes|required',
            'body_mass' => 'sometimes|required',
            'body_fat' => 'sometimes|required',
            'weight_loss' => 'sometimes|required',
            'fat' => 'sometimes|required',
            'waist' => 'sometimes|required',
            'water' => 'sometimes|required',
            'muscle' => 'sometimes|required',
            'abdomen' => 'sometimes|required',
        ];
    }
}
