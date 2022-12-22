<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\VaccinationHistoryRequest;
use App\Http\Resources\API\V1\Patient\VaccinationHistoryResource;
use App\Models\MedicalHistory;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\VaccinationHistory;
use Illuminate\Support\Facades\DB;

class VaccinationHistoryController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Patient')->only([
            'store',
            'show',
            'update'
        ]);
    }

    public function index()
    {
        //
    }

    public function store(VaccinationHistoryRequest $request)
    {
        try {
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();
            DB::beginTransaction();
            $vaccination_history = VaccinationHistory::create([
                'vaccine' => $request->vaccine,
                'dose' => $request->dose,
                'lot_number' => $request->lot_number,
                'application_date' => $request->application_date,
            ]);

            $medical_history = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();
            $medical_history->vaccination_history_id = $vaccination_history->id;
            $medical_history->save();

            DB::commit();
            return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => 'Informacion guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($id)
    {
        try {
            DB::beginTransaction();
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $medical_history = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();
            $vaccination_history = VaccinationHistory::where('id', $medical_history->vaccination_history_id)->get();

            DB::commit();
            return (VaccinationHistoryResource::collection($vaccination_history))->additional(['message' => 'Historial de vacunacion encontrado']);

            //return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => '..']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(VaccinationHistoryRequest $request,$id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
                
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();
            $vaccination_history = VaccinationHistory::where('id', $medical_history->vaccination_history_id)->firstOrFail();

            DB::beginTransaction();

            $vaccination_history->vaccine = $request->vaccine;
            $vaccination_history->dose = $request->dose;
            $vaccination_history->lot_number = $request->lot_number;
            $vaccination_history->application_date = $request->application_date;
            $vaccination_history->save();

            DB::commit();
            return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => 'Informacion actualizada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
