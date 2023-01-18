<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PersonalizedQuestionnaireStoreRequest;
use App\Http\Requests\API\V1\Physician\PersonalizedQuestionnaireUpdateRequest;
use App\Http\Resources\API\V1\Physician\PersonalizedQuestionnaireResource;
use App\Models\PersonalizedQuestionnaire;
use App\Models\Physician;
use Illuminate\Support\Facades\DB;

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
            $personalized_questionnaire = $this->getPersonalizedQuestionnaire($personalized_questionnaire_id);

            if (! $personalized_questionnaire) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }

            return (new PersonalizedQuestionnaireResource($personalized_questionnaire))
                ->additional(['message' => 'Cuestionario personalizado encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PersonalizedQuestionnaireStoreRequest $request)
    {
        try {
            $data = $request->validated();

            DB::beginTransaction();

            $personalized_questionnaire = PersonalizedQuestionnaire::create([
                'physician_id' => $this->physician->id,
                'title' => $data['title'],
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

            DB::commit();

            return (new PersonalizedQuestionnaireResource($personalized_questionnaire))
                    ->additional(['message' => 'Cuestionario personalizado guardado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PersonalizedQuestionnaireUpdateRequest $request, $personalized_questionnaire_id)
    {
        try {
            $data = $request->validated();

            $personalized_questionnaire = $this->getPersonalizedQuestionnaire($personalized_questionnaire_id);

            if (! $personalized_questionnaire) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }

            DB::beginTransaction();

            $personalized_questionnaire->update([
                'title' => $data['title'],
            ]);

            foreach ($data['questions'] as $key => $question) {
                $update_question = $personalized_questionnaire->questions()
                    ->updateOrCreate(
                        ['id' => $question['question_id']],
                        ['title' => $question['title']]
                    );

                foreach ($data['questions'][$key]['answers'] as $answer) {
                    $update_question->answers()
                        ->updateOrCreate(
                            ['id' => $answer['answer_id']],
                            ['title' => $answer['title']]
                        );
                }
            }

            DB::commit();

            return (new PersonalizedQuestionnaireResource($personalized_questionnaire))
                ->additional(['message' => 'Cuestionario personalizado actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function getPersonalizedQuestionnaire($personalized_questionnaire_id)
    {
        try {
            return PersonalizedQuestionnaire::where('id', $personalized_questionnaire_id)
                ->where('physician_id', $this->physician->id)
                ->first();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
