<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVitalSignRequest extends FormRequest
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
            'temperature' => 'required',
            'weight' => 'required',
            'breathing_frecuncy' => 'required',
            'systolic_pressure' => 'required',
            'diasystolic_pressure' => 'required',
            'heart_rate' => 'required',
            'oxygen_saturation' => 'required',
            'body_mass' => 'required',
            'body_fat' => 'required',
            'weight_loss' => 'required',
            'fat' => 'required',
            'waist' => 'required',
            'water' => 'required',
            'muscle' => 'required',
            'abdomen' => 'required',
        ];
    }
}
