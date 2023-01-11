<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{

    public function run()
    {
        $survey = Survey::create([
            'physician_id' => 10,
            'title' => 'Cuestionario test'
        ]);
        $questions = $survey->questions()
        ->insert([
            [
                'survey_id' => $survey->id,
                'title' => 'Pregunta 1',
            ],
            [
                'survey_id' => $survey->id,
                'title' => 'Pregunta 2',
            ]
        ]);
        $questions = $survey->questions;
        foreach ($questions as $question) {
            $question->answers()->create([
                'title' => 'Si, No',
                'question_id' => $survey->id
            ]);
        }
    }
}
