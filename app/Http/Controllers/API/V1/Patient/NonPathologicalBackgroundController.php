<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\NonPathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\NonPathologicalBackgroundResource;
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
        $this->middleware('role:Patient')->only([
            'show',
            'store',
            'update',
        ]);
       /*  $this->middleware('role:Patient')->only(['store']);
        $this->middleware('permission:edit non pathological background')->only(['update']); */
    }

    public function index()
    {
        //
    }

    public function store(NonPathologicalBackgroundRequest $request)
    {
        try {
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();
            DB::beginTransaction();
            $no_pathological = NonPathologicalBackground::create([
                'physical_activity' => $request->physical_activity,
                'rest_time' => $request->rest_time,
                'smoking' => $request->smoking,
                'alcoholim' => $request->alcoholim,
                'other_substances' => $request->other_substances,
                'diet' => $request->diet,
                'drug_active' => $request->drug_active,
                'previous_medication' => $request->previous_medication,
            ]);
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->update([
                'non_pathological_background_id' => $no_pathological->id,
            ]);
            DB::commit();
            return (new NonPathologicalBackgroundResource($no_pathological))->additional(['message' => 'Informacion guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $medical_history = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();

            $no_pathological = NonPathologicalBackground::where('id', $medical_history->non_pathological_background_id)->get();

            return (NonPathologicalBackgroundResource::collection($no_pathological))->additional(['message' => 'Historial de enfermedades encontrada']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(NonPathologicalBackgroundRequest $request,$id)
    {

        try {

            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $medical_history = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();
            $no_pathological = NonPathologicalBackground::where('id', $medical_history->non_pathological_background_id)->firstOrFail();

                $no_pathological = tap($no_pathological)->update([
                    'physical_activity' => $request->physical_activity,
                    'rest_time' => $request->rest_time,
                    'smoking' => $request->smoking,
                    'alcoholim' => $request->alcoholim,
                    'other_substances' => $request->other_substances,
                    'diet' => $request->diet,
                    'drug_active' => $request->drug_active,
                    'previous_medication' => $request->previous_medication,
                ]);
                return (new NonPathologicalBackgroundResource($no_pathological))->additional(['message' => 'Informacion actualizada con exito.']);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
