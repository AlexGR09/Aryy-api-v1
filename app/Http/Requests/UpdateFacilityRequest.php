<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacilityRequest extends FormRequest
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
            'name' => 'nullable|max:255',
            'phone' => 'nullable|unique:consulting_rooms|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'extension' => 'nullable',
            'attetion_time' => 'nullable',
            'zipcode' => 'nullable|max:5|min:5',
            'state' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'town' => 'nullable|max:255',
            'street' => 'nullable|max:255',
            'exterior_no' => 'nullable|max:10',
            'interior_no' => 'nullable|max:10',
            'references' => 'nullable|max:255',
            'accesibility' => 'nullable|max:255',
            'public_target' => 'nullable|max:255',
            'services' => 'nullable|max:255',
        ];
    }
}
