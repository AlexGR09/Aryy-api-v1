<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class VaccinationHistoryRequest extends FormRequest
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
            'vaccine' => 'nullable|string',
            'dose' => 'nullable|string',
            'lot_number' => 'nullable|string',
            'application_date' => 'nullable|date',
        ];
    }
}
