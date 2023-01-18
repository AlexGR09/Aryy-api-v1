<?php

namespace App\Http\Requests\API\V1\Patient;

use Illuminate\Foundation\Http\FormRequest;

class PosnatalBackgroundRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            // 'medical_history_id' => 'required|numeric',
            'delivery_details' => 'nullable|string|max:255',
            'baby_name' => 'nullable|string|max:60',
            'baby_weight' => 'nullable|string|max:20',
            'baby_health' => 'nullable|string|max:60',
            'type_of_feeding' => 'nullable|array|required_array_keys:formula,breastfeed,both',
            'type_of_feeding.*' => 'boolean',
            'emotonial_state' => 'nullable|string|max:60',
        ];
    }
}
