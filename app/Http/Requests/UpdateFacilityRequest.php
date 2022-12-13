<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
            'name' => 'nullable|max:255',
            'location.address' => 'nullable',
            'location.state' => 'nullable',
            'location.number_ext' => 'nullable',
            'location.number_int' => 'nullable',
            'location.reference' => 'nullable',
            'location.suburb' => 'nullable',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'extension' => 'nullable',
            'zipcode' => 'nullable|max:5|min:5',
            'schedule.*.day' => 'nullable',
            'schedule.*.attention_time' => 'nullable',
            'type_schedule' => 'nullable',
            'consultation_length' => 'nullable',
            'accessibility_and_others.accessibility.parking_with_access_to_the_establishment' => 'nullable',
            'accessibility_and_others.accessibility.wheelchair_lift_or_ramp' => 'nullable',
            'accessibility_and_others.accessibility.toilets_with_wheelchair_access' => 'nullable',
            'accessibility_and_others.accessibility.rest_area_with_wheelchair_access' => 'nullable',
            'accessibility_and_others.accessibility.staff_trained_in_sign_language' => 'nullable',
            'accessibility_and_others.accessibility.braille_signage_for_blind_people' => 'nullable',
            'accessibility_and_others.usual_audiences.lgtb_friendly' => 'nullable',
            'accessibility_and_others.usual_audiences.safe_space_for_transgender_people' => 'nullable',
            'accessibility_and_others.services.toilets' => 'nullable',
            'accessibility_and_others.services.unisex_toilets' => 'nullable',
            'accessibility_and_others.services.wifi' => 'nullable',
            'city_id' => 'nullable',

        ];
    }
}
