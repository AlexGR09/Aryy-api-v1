<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'facility_name' => 'required|max:100',
            'location' => 'required|array',
            'phone_number' => 'min:10|regex:/^([0-9\s\-\+\(\)]*)$/|',
            'zip_code' => 'required|digits:5',
            'schedule' => 'array',
            'type_schedule' => 'in:permanente,temporal',
            'consultation_length' => 'max:45',
            'accessibility_and_others' => 'array',
            'clues' => 'max:60',
            'city_id' => 'required|numeric',
            'location.address' => 'required|max:200',
            'location.number_int' => 'required|digits_between:1,20',
            'location.number_ext' => 'required|digits_between:1,20',
            'location.reference' => 'required|max:60',
            'schedule.*.day' => 'required|in:lunes,martes,miércoles,jueves,viernes,sábado,domingo',
            'schedule.*.attention_time' => 'required|max:200',
            'accessibility_and_others.accessibility.*' => 'boolean',
            'accessibility_and_others.usual_audiences.*' => 'boolean',
            'accessibility_and_others.services.*' => 'boolean'
        ];
    }

    public function attributes()
    {
        return [
            'facility_name' => 'nombre de la instalación',
            'location' => 'ubicación',
            'phone_number' => 'número de teléfono',
            'zip_code' => 'código postal',
            'schedule' => 'horario',
            'consultation_length' => 'duración de la consulta',
            'accessibility' => 'accesibilidad',
            'city_id' => 'id de ciudad',
            'location.address' => 'dirección',
            'location.number_int' => 'número interior',
            'location.number_ext' => 'número exterior',
            'schedule.*.day' => 'día en el conjunto horario',
            'schedule.*.attention_time' => 'horario de atención en el conjunto horario'
        ];
    }
}
