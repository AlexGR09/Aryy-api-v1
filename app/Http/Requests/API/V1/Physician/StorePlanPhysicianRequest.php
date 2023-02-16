<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanPhysicianRequest extends FormRequest
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
            'physician_id' => 'required|exists:\App\Models\Physician,id|unique:subscriptions,physician_id',
            'plan_id' => 'required|exists:\App\Models\Plan,id',
        ];
    }
}
