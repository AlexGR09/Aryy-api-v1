<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|time',
            'appointment_type' => 'required',
            'patient_id' => 'required',
            'facility_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'appointment_date' => 'Fecha de la cita',
            'appointment_time' => 'Hora de la cita',
            'appointment_type' => 'Tipo de consulta',
            'patient_id' => 'Id del paciente',
            'facility_id' => 'Id del medico',
        ];
    }
}
