<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\NonPathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\NonPathologicalBackgroundResoucer;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;

class NonPathologicalBackgroundController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        //
    }

    public function store(NonPathologicalBackgroundRequest $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                DB::beginTransaction();

                $no_pathological = new NonPathologicalBackground();
                $no_pathological->physical_activity = json_encode($request->physical_activity);
                $no_pathological->rest_time = json_encode($request->rest_time);
                $no_pathological->smoking = json_encode($request->smoking);
                $no_pathological->alcoholim = json_encode($request->alcoholim);
                $no_pathological->other_substances = $request->other_substances;
                $no_pathological->diet = $request->diet;
                $no_pathological->drug_active = $request->drug_active;
                $no_pathological->previous_medication = $request->previous_medication;
                $no_pathological->save();

                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
                $medical_history->non_pathological_background_id = $no_pathological->id;
                $medical_history->save();

                DB::commit();
                return (new NonPathologicalBackgroundResoucer($no_pathological))->additional(['message' => 'Informacion guardada con exito.']);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();

                $no_pathological = NonPathologicalBackground::where('id', $medical_history->non_pathological_background_id)->first();

                //return (MedicalHistoryResoucer::collection($medical_history))->additional(['message' => 'Mi perfil de paciente.']);
                return (new NonPathologicalBackgroundResoucer($no_pathological))->additional(['message' => '..']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(NonPathologicalBackgroundRequest $request)
    {

        try {

            $patient = Patient::where('user_id', $this->user->id)->first();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
            $no_pathological = NonPathologicalBackground::where('id', $medical_history->non_pathological_background_id)->first();

            if ($this->user->hasRole('Patient')) {

                DB::beginTransaction();

                $no_pathological->physical_activity = json_encode($request->physical_activity);
                $no_pathological->rest_time = json_encode($request->rest_time);
                $no_pathological->alcoholim = json_encode($request->alcoholim);
                $no_pathological->smoking = json_encode($request->smoking);
                $no_pathological->other_substances = json_encode($request->other_substances);
                $no_pathological->diet = $request->diet;
                $no_pathological->drug_active = $request->drug_active;
                $no_pathological->previous_medication = $request->previous_medication;
                $no_pathological->save();

                DB::commit();
                return (new NonPathologicalBackgroundResoucer($no_pathological))->additional(['message' => 'Informacion actualizada con exito.']);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy($id)
    {
        //
    }
}
