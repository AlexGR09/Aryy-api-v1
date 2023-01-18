<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class StoreNonPathologicalBackgroundRequest extends FormRequest
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
            'physical_activity.type_of_activity' => 'string',
            'physical_activity.days_of_the_week' => 'string',
            'rest_time.hours_of_sleep' => 'string',
            'rest_time.dreams_while_sleeping' => 'string',
            'rest_time.rest_when_sleeping' => 'string',
            'smoking.number_of_cigarettes' => 'string',
            'smoking.type' => 'string',
            'alcoholim.weekly_frequency' => 'string',
            'alcoholim.type' => 'string',
            'other_substances' => 'string',
            'diet' => 'string',
            'drug_active' => 'string',
            'previous_medication' => 'string',
        ];
    }
}
