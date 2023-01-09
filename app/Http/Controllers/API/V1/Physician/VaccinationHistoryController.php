<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\VaccinationHistoryResource;
use App\Models\MedicalHistory;
use App\Models\Physician;
use App\Models\VaccinationHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaccinationHistoryController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'drugActive',
            'previusMedication',
        ]);
        // $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->physician = empty(auth()->id()) ? NULL : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function index()
    {
        //
    }

    public function store(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $vaccination_history = VaccinationHistory::create([
                'vaccine' => $request->vaccine,
                'dose' => $request->dose,
                'lot_number' => $request->lot_number,
                'application_date' => $request->application_date,
                'patient_id' => $id,
            ]);

            $medicalhistory = MedicalHistory::where('patient_id', $id)->first();
            $medicalhistory->vaccination_history_id = $vaccination_history->id;
            $medicalhistory->save();
            DB::commit();
            return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function show($id)
    {
        try {
            $medicalhistory = MedicalHistory::where('patient_id', $id)->first();
            $vaccination_history = VaccinationHistory::where('id', $medicalhistory->vaccination_history_id)->get();
            return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
