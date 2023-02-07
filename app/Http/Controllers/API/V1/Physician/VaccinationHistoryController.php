<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\VaccinationHistoryRequest;
use App\Http\Resources\API\V1\Patient\VaccinationHistoryResource;
use App\Http\Resources\API\V1\Physician\MedicalHistoryVaccinationResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\MedicalHistoryVaccination;
use App\Models\Physician;
use App\Models\VaccinationHistory;
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
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function store(VaccinationHistoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $todaydatetime = date('Y-m-d');
            /*  $medicalAppointment = MedicalAppointment::where('patient_id', $request->patient_id)
                 ->where('physician_id', $this->physician->id)
                 ->first();
             //se compara la fecha actual con la fecha de la cita
             if ($medicalAppointment->appointment_date != $todaydatetime) {
                 return "Petición incorrecta";
             } */
            $medical_history = $this->medicalhistory($request->patient_id);
            $vaccination_history = VaccinationHistory::create($request->validated());
            $medical_history_vaccination = MedicalHistoryVaccination::create([
                'patient_id' => $request->patient_id,
                'vaccination_history_id' => $vaccination_history->id,
            ]);
            DB::commit();

            return (new VaccinationHistoryResource($vaccination_history))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function show($medical_history_id)
    {
        try {
            $medical_history = $this->medicalHistory($medical_history_id);
            $vaccinationhistory = MedicalHistoryVaccination::where('patient_id', $medical_history->patient_id)->with('vaccination_history')->get();
            if (! $vaccinationhistory) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }

            return MedicalHistoryVaccinationResource::collection($vaccinationhistory)->additional(['message' => 'Historial de vacunación.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function medicalhistory($medical_history_id)
    {
        try {
            $medical_history = MedicalHistory::where('id', $medical_history_id)->first();
            if ($medical_history) {
                $medical_appointments = MedicalAppointment::where([['patient_id', $medical_history->patient_id], ['physician_id', $this->physician->id]])->count();
                if ($medical_appointments > 0) {
                    return $medical_history;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
