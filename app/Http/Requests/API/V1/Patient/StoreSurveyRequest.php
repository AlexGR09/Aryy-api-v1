<?php

namespace App\Http\Requests\API\Patient;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyRequest extends FormRequest
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
            'title' => 'required',
            'survey' => 'required|array',
            'survey.*.questions.question' => 'required',
            'survey.*.questions.answer' => 'required',
        ];
    }
}
