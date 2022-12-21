<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\HereditaryBackgroundRequest;
use App\Http\Resources\API\V1\Patient\HereditaryBackgroundResource;
use App\Models\HereditaryBackground;
use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class HereditaryBackgroundController extends Controller
{
    public ?\Illuminate\Contracts\Auth\Authenticatable $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Patient')->only([
            'store',
            'show',
            'update',
        ]);
    }

    public function index()
    {
        //
    }

    public function store(HereditaryBackgroundRequest $request)
    {
        try {
            DB::beginTransaction();
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();

            $hereditary_background = HereditaryBackground::create([
                'diabetes' => $request->diabetes,
                'heart_diseases' => $request->heart_diseases,
                'blood_pressure' => $request->blood_pressure,
                'thyroid_diseases' => $request->thyroid_diseases,
                'cancer' => $request->cancer,
                'kidney_stones' => $request->kidney_stones,
            ]);

            $medical_history = MedicalHistory::where('patient_id', $patient->id)->update([
                'hereditary_background_id' => $hereditary_background->id,
            ]);

            DB::commit();

            return (new HereditaryBackgroundResource($hereditary_background))->additional(['message' => 'Informacion guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            DB::beginTransaction();
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();

            $medical_history = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();
            $hereditary_background = HereditaryBackground::where('id', $medical_history->hereditary_background_id)->get();

            DB::commit();
            return (HereditaryBackgroundResource::collection($hereditary_background))->additional(['message' => '..']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(HereditaryBackgroundRequest $request)
    {
        try {
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();
            $hereditary_background = HereditaryBackground::where('id', $medical_history->hereditary_background_id)->firstOrFail();

            $hereditary_background->diabetes = $request->diabetes;
            $hereditary_background->heart_diseases = $request->heart_diseases;
            $hereditary_background->blood_pressure = $request->blood_pressure;
            $hereditary_background->thyroid_diseases = $request->thyroid_diseases;
            $hereditary_background->cancer = $request->cancer;
            $hereditary_background->kidney_stones = $request->kidney_stones;
            $hereditary_background->save();

            return (new HereditaryBackgroundResource($hereditary_background))->additional(['message' => 'Informacion actualizada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
