<?php

namespace App\Http\Requests\API\V2\Patient;

use Illuminate\Foundation\Http\FormRequest;

class PillReminderRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'drug' => 'required|string',
            'doce' => 'required|string',
            'frecuency' => 'required|string',
            'start_treatment' => 'required|date',
            'end_treatment' => 'required|date',
<<<<<<< HEAD
            'instruction' => 'nullable|string',
=======
            'first_take' => 'required|date_format:H:i',
            'instruction' => 'nullable|string'
>>>>>>> b79841ead77829b8713b5979009eb3dd67907391
        ];
    }
}
