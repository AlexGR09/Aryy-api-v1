<?php

namespace App\Http\Requests\API\V1\Physician;

use Illuminate\Foundation\Http\FormRequest;

class PersonalizedQuestionnaireUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:200',
            'questions' => 'required|array',
            'questions.*.question_id' => 'present|nullable|distinct',
            'questions.*.title' => 'required|string',
            'questions.*.answers' => 'required|array',
            'questions.*.answers.*.answer_id' => 'present|nullable|distinct',
            'questions.*.answers.*.title' => 'required|string',
        ];
    }
}
