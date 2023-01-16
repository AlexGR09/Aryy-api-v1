<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\VaccinationHistoryResource;
use App\Models\MedicalAppointment;
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
            'store',
            'previusMedication',
        ]);
        // $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->physician = empty(auth()->id()) ? NULL : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $vaccination_history = VaccinationHistory::create([
                'vaccine' => $request->vaccine,
                'dose' => $request->dose,
                'lot_number' => $request->lot_number,
                'application_date' => $request->application_date,
            ]);

            $medical_history = MedicalHistory::where('patient_id', $request->patient_id)->FirstOrFail();
            $medical_history->vaccination_history_id = $vaccination_history->id;
            $medical_history->save();

            DB::commit();
            return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function show($medical_history_id)
    {
        try {
            $medical_history = MedicalHistory::where('id', $medical_history_id)->firstOrFail();
            $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }
            return (new VaccinationHistoryResource($medical_history->vaccinationhistory))->additional(['message' => 'Informacion encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function update(Request $request, $medical_history_id)
    {
        try {
            DB::beginTransaction();
            $medicalHistory = MedicalHistory::where('id', $medical_history_id)->firstOrFail();
            $vaccination_history = VaccinationHistory::where('id', $medicalHistory->vaccination_history_id)->firstOrFail();
            $medical_appointments = MedicalAppointment::where('patient_id', $$medicalHistory->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }
            $vaccination_history->vaccine = $request->vaccine;
            $vaccination_history->dose = $request->dose;
            $vaccination_history->lot_number = $request->lot_number;
            $vaccination_history->application_date = $request->application_date;
            $vaccination_history->save();
            DB::commit();
            return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        //
    }
}
