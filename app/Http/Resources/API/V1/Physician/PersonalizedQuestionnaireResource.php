<?php

namespace App\Http\Resources\API\V1\Physician;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalizedQuestionnaireResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'personalized_questionnaire_id' => $this->id,
            'physician_id' => $this->physician_id,
            'title' => $this->title,
            'questions' => $this->questions,
        ];
    }
}
