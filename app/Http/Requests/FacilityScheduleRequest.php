<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityScheduleRequest extends FormRequest
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
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'extension' => 'nullable',
            'schedule.*.day' => 'required',
            'schedule.*.attention_time' => 'required',
            'type_schedule' => 'required',
            'consultation_length' => 'required',
            // 'accessibility_and_others.accessibility.parking_with_access_to_the_establishment' => 'required',
            // 'accessibility_and_others.accessibility.wheelchair_lift_or_ramp' => 'required',
            // 'accessibility_and_others.accessibility.toilets_with_wheelchair_access' => 'required',
            // 'accessibility_and_others.accessibility.rest_area_with_wheelchair_access' => 'required',
            // 'accessibility_and_others.accessibility.staff_trained_in_sign_language' => 'required',
            // 'accessibility_and_others.accessibility.braille_signage_for_blind_people' => 'required',
            // 'accessibility_and_others.usual_audiences.lgtb_friendly' => 'required',
            // 'accessibility_and_others.usual_audiences.safe_space_for_transgender_people' => 'required',
            // 'accessibility_and_others.services.toilets' => 'required',
            // 'accessibility_and_others.services.unisex_toilets' => 'required',
            // 'accessibility_and_others.services.wifi' => 'required',
        ];
    }
}
