<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PathologicalBackgorundRequest;
use App\Http\Resources\API\V1\Patient\BasicImformationResoucer;
use App\Http\Resources\API\V1\Patient\PathologicalBackgorundResoucer;
use App\Models\MedicalHistory;
use App\Models\PathologicalBackground;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PathologicalBackgroudController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        //
    }

    public function store(PathologicalBackgorundRequest $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                DB::beginTransaction();
                $pathological_background = new PathologicalBackground();
                $pathological_background->previous_surgeries = $request->previous_surgeries;
                $pathological_background->blood_transfusions = $request->blood_transfusions;
                $pathological_background->diabetes = $request->diabetes;
                $pathological_background->heart_diseases = $request->heart_diseases;
                $pathological_background->blood_pressure = $request->blood_pressure;
                $pathological_background->thyroid_diseases = $request->thyroid_diseases;
                $pathological_background->cancer = $request->cancer;
                $pathological_background->kidney_stones = $request->kidney_stones;
                $pathological_background->hepatitis = $request->hepatitis;
                $pathological_background->trauma = $request->trauma;
                $pathological_background->respiratory_diseases = $request->respiratory_diseases;
                $pathological_background->ets=$request->ets;
                $pathological_background->gastrointestinal_pathologies = $request->gastrointestinal_pathologies;
                $pathological_background->save();

                $medical_history = MedicalHistory::where('patient_id',$patient->id)->first();
                $medical_history->pathological_background_id = $pathological_background->id;
                $medical_history->save();

                DB::commit();
                return (new PathologicalBackgorundResoucer($medical_history))->additional(['message' => 'Informacion guardada con exito.']);
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
                $patient = Patient::where('user_id',$this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id',$patient->id)->first();
                //return $medical_history;
                
                //return (BasicImformationResoucer::collection($medical_history))->additional(['message' => 'Mi perfil de paciente.']);
                return (new PathologicalBackgorundResoucer($medical_history))->additional(['message' => '..']);
            }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PathologicalBackgorundRequest $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                DB::beginTransaction();
                $medical_history = MedicalHistory::where('patient_id',$patient->id)->first();

                $pathological_background= PathologicalBackground::where('id',$medical_history->pathological_background_id)->firsT();
                $pathological_background->previous_surgeries = $request->previous_surgeries;
                $pathological_background->blood_transfusions = $request->blood_transfusions;
                $pathological_background->diabetes = $request->diabetes;
                $pathological_background->heart_diseases = $request->heart_diseases;
                $pathological_background->blood_pressure = $request->blood_pressure;
                $pathological_background->thyroid_diseases = $request->thyroid_diseases;
                $pathological_background->cancer = $request->cancer;
                $pathological_background->kidney_stones = $request->kidney_stones;
                $pathological_background->hepatitis = $request->hepatitis;
                $pathological_background->trauma = $request->trauma;
                $pathological_background->respiratory_diseases = $request->respiratory_diseases;
                $pathological_background->ets=$request->ets;
                $pathological_background->gastrointestinal_pathologies = $request->gastrointestinal_pathologies;
                $pathological_background->save();
                DB::commit();
                return (new BasicImformationResoucer($medical_history))->additional(['message' => 'Informacion actualizada con exito.']);
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
