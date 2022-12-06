<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\NonPathologicalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\NonPathologicalBackgroundResource;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class NonPathologicalBackgroundController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable|null|mixed
     */
    public $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Patient')->only(['show']);
        $this->middleware('role:Patient')->only(['store']);
        $this->middleware('permission:edit non pathological background')->only(['update']);
    }

    public function index()
    {
        //
    }

    public function store(NonPathologicalBackgroundRequest $request)
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
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

    public function show()
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();

            $no_pathological = NonPathologicalBackground::where('id', $medical_history->non_pathological_background_id)->get();

            return NonPathologicalBackgroundResource::collection($no_pathological)->additional(['message' => '..']);
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
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
