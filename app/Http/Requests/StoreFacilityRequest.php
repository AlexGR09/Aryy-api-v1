<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacilityRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required|unique:consulting_rooms|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'extension' => 'required',
            'attetion_time' => 'required',
            'zipcode' => 'required|max:5|min:5',
            'state' => 'required|max:255',
            'city' => 'required|max:255',
            'town' => 'required|max:255',
            'street' => 'required|max:255',
            'exterior_no' => 'required|max:10',
            'interior_no' => 'nullable|max:10',
            'references' => 'required|max:255',
            'accesibility' => 'required|max:255',
            'public_target' => 'required|max:255',
            'services' => 'required|max:255',
        ];
    }
}
