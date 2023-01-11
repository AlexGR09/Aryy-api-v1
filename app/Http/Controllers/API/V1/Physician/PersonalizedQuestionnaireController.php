<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PersonalizedQuestionnaireRequest;
use App\Http\Resources\API\V1\Physician\PersonalizedQuestionnaireResource;
use App\Models\PersonalizedQuestionnaire;
use App\Models\Physician;

class PersonalizedQuestionnaireController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician');

        $this->physician = Physician::where('user_id', auth()->id())->first();
    }

    public function index()
    {
        try {
            return response()->json(['data' => $this->physician->personalized_questionnaires]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($personalized_questionnaire_id)
    {
        try {
            $personalized_questionnaire = PersonalizedQuestionnaire::where('id', $personalized_questionnaire_id)
                ->where('physician_id', $this->physician->id)
                ->first();

            if (!$personalized_questionnaire) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }

            return (new PersonalizedQuestionnaireResource($personalized_questionnaire))
                ->additional(['message' => 'Cuestionario personalizado encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PersonalizedQuestionnaireRequest $request)
    {
        try {
            $data = $request->validated();

            $personalized_questionnaire = PersonalizedQuestionnaire::create([
                'physician_id' => $this->physician->id,
                'title' => $data['title']
            ]);

            foreach ($data['questions'] as $key => $question) {
                $new_question = $personalized_questionnaire->questions()->create([
                    'personalized_questionnaire_id' => $personalized_questionnaire->id,
                    'title' => $question['title'],
                ]);

                foreach ($data['questions'][$key]['answers'] as $answer) {
                    $new_question->answers()->create([
                        'question_id' => $new_question->id,
                        'title' => $answer['title'],
                    ]);
                }
            }

            return (new PersonalizedQuestionnaireResource($personalized_questionnaire))
                    ->additional(['message' => 'Cuestionario personalizado guardado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
