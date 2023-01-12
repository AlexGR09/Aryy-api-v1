<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNonPathologicalBackgroundRequest extends FormRequest
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
            'physical_activity.type_of_activity' => 'sometimes|string',
            'physical_activity.days_of_the_week' => 'sometimes|string',
            'rest_time.hours_of_sleep' => 'sometimes|string',
            'rest_time.dreams_while_sleeping' => 'sometimes|string',
            'rest_time.rest_when_sleeping' => 'sometimes|string',
            'smoking.number_of_cigarettes' => 'sometimes|string',
            'smoking.type' => 'sometimes|string',
            'alcoholim.weekly_frequency' => 'sometimes|string',
            'alcoholim.type' => 'sometimes|string',
            'other_substances' => 'sometimes|string',
            'diet' => 'sometimes|string',
            'drug_active' => 'sometimes|string',
            'previous_medication' => 'sometimes|string',
        ];
    }
}
