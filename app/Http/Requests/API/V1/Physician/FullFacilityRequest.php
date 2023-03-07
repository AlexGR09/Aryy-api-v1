<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class FullFacilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'location.address' => 'required',
            'location.state' => 'required',
            'location.number_ext' => 'required',
            'location.number_int' => 'nullable',
            'zipcode' => 'required|max:5|min:5',
            'city_id' => 'required',
            'location.reference' => 'nullable',
            'location.suburb' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'extension' => 'nullable',
            'calling_attetion_schedule.*.day' => 'nullable',
            'calling_attetion_schedule.*.attention_time1' => 'nullable',
            'calling_attetion_schedule.*.attention_time2' => 'nullable',
            // 'type_schedule' => 'required',
            // 'consultation_length' => 'required',
            // 'accessibility_and_others.accessibility.parking_with_access_to_the_establishment' => 'required',
            'accessibility_and_others.accessibility.wheelchair_ramp' => 'required',
            'accessibility_and_others.accessibility.wheelchair_lift' => 'required',

            'accessibility_and_others.accessibility.toilets_with_wheelchair_access' => 'nullable',
            'accessibility_and_others.accessibility.rest_area_with_wheelchair_access' => 'nullable',
            'accessibility_and_others.accessibility.staff_trained_in_sign_language' => 'nullable',
            'accessibility_and_others.accessibility.braille_signage_for_blind_people' => 'nullable',
            'accessibility_and_others.usual_audiences.lgtb_friendly' => 'nullable',
            'accessibility_and_others.usual_audiences.safe_space_for_transgender_people' => 'nullable',
            'accessibility_and_others.services.toilets' => 'nullable',
            'accessibility_and_others.services.unisex_toilets' => 'nullable',
            'accessibility_and_others.services.wifi' => 'nullable',
            'coordinates' => 'nullable',
        ];
    }
}
