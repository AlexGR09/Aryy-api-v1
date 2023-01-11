<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $survey = Survey::create([
        //     'physician_id' => 3,
        //     'title' => 'Cuestionario de pokemon'
        // ]);
        // $questions = $survey->questions()
        // ->insert([
        //     [
        //         'survey_id' => $survey->id,
        //         'physician_id' => 3,
        //         'title' => 'Pokemon Favorito',
        //     ],
        //     [
        //         'survey_id' => $survey->id,
        //         'physician_id' => 3,
        //         'title' => 'Poder Favorito2',
        //     ]
        // ]);
        // $questions = $survey->questions;
        // foreach ($questions as $question) {
        //     $question->answers()->create([
        //         'answer' => 'Si',
        //         'survey_id' => $survey->id,
        //         'physician_id' => 5
        //     ]);
        // }
    }
}
