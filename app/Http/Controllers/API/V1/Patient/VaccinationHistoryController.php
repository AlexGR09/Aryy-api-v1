<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\VaccinationHistoryRequest;
use App\Http\Resources\API\V1\Patient\VaccinationHistoryResoucer;
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
    }

    public function index()
    {
        //
    }

    public function store(VaccinationHistoryRequest $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                DB::beginTransaction();
                $vaccination_history = new VaccinationHistory();
                $vaccination_history->vaccine = $request->vaccine;
                $vaccination_history->dose = $request->dose;
                $vaccination_history->lot_number = $request->lot_number;
                $vaccination_history->application_date = $request->application_date;
                $vaccination_history->save();

                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
                $medical_history->vaccination_history_id = $vaccination_history->id;
                $medical_history->save();

                DB::commit();
                return (new VaccinationHistoryResoucer($vaccination_history))->additional(['message' => 'Informacion guardada con exito.']);
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
            
                DB::beginTransaction();                
                $patient = Patient::where('user_id', $this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
                $vaccination_history = VaccinationHistory::where('id', $medical_history->vaccination_history_id)->get();

                DB::commit();
                return (VaccinationHistoryResoucer::collection($vaccination_history))->additional(['message' => '..']);

                //return (new VaccinationHistoryResoucer($vaccination_history))->additional(['message' => '..']);
            }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(VaccinationHistoryRequest $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
                $vaccination_history = VaccinationHistory::where('id', $medical_history->vaccination_history_id)->first();

                DB::beginTransaction();

                $vaccination_history->vaccine = $request->vaccine;
                $vaccination_history->dose = $request->dose;
                $vaccination_history->lot_number = $request->lot_number;
                $vaccination_history->application_date = $request->application_date;
                $vaccination_history->save();

                DB::commit();
                return (new VaccinationHistoryResoucer($vaccination_history))->additional(['message' => 'Informacion actualizada con exito.']);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy()
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
                $vaccination_history = VaccinationHistory::where('id', $medical_history->vaccination_history_id)->first();

                $vaccination_history->delete();
                //return (MedicalHistoryResoucer::collection($medical_history))->additional(['message' => 'Mi perfil de paciente.']);
                return (new VaccinationHistoryResoucer($vaccination_history))->additional(['message' => 'Informacion elimidada con exito']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
