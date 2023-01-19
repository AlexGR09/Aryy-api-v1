<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class MedicalAppoinmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            /* 'country_code' => 'required|string',
            'phone_number' => 'required|string', */
            'appointment_date' => 'required|date',
            'appointment_type' => 'required|string',
            'appointment_time' => 'required|time',
        ];
    }
}
