<?php

namespace Database\Seeders;

use App\Models\PersonalizedQuestionnaire;
use Illuminate\Database\Seeder;

class PersonalizedQuestionnaireSeeder extends Seeder
{
    public function run()
    {
        $personalized_questionnaire = PersonalizedQuestionnaire::create([
            'physician_id' => 10,
            'title' => 'Cuestionario test',
        ]);
        $questions = $personalized_questionnaire->questions()
        ->insert([
            [
                'personalized_questionnaire_id' => $personalized_questionnaire->id,
                'title' => 'Pregunta 1',
            ],
            [
                'personalized_questionnaire_id' => $personalized_questionnaire->id,
                'title' => 'Pregunta 2',
            ],
        ]);
        $questions = $personalized_questionnaire->questions;
        foreach ($questions as $question) {
            $question->answers()->insert([
                [
                    'title' => 'Sí',
                    'question_id' => $question->id,
                ],
                [
                    'title' => 'No',
                    'question_id' => $question->id,
                ],
            ]);
        }
    }
}
