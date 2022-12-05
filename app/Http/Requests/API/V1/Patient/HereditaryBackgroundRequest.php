<?php

namespace App\Http\Requests\API\V1\Patient;

use DragonCode\Contracts\Cashier\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class HereditaryBackgroundRequest extends FormRequest
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
            'diabetes.family'=>'string',
            'diabetes.type'=>'string',
            'heart_diseases.family'=>'string',
            'heart_diseases.type'=>'string',
            'blood_pressure.family'=>'string',
            'blood_pressure.type'=>'string',
            'thyroid_diseases.family'=>'string',
            'thyroid_diseases.type'=>'string',
            'cancer.family'=>'string',
            'cancer.type'=>'string',
            'kidney_stones.family'=>'string',
            'kidney_stones.type'=>'string'
        ];
        
    }
}
