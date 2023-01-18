<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\VaccinationHistoryRequest;
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
            $vaccination_history = VaccinationHistory::create($request->validated());

            $medical_history = $this->medicalhistory($request->patient_id);
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
            $medical_history = $this->medicalHistory($medical_history_id);
            if (!$medical_history) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }
            return (new VaccinationHistoryResource($medical_history->vaccinationhistory))->additional(['message' => 'Historial de vacunación.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function medicalhistory($medical_history_id)
    {
        try {
            $medical_history = MedicalHistory::where('id', $medical_history_id)->first();

            if ($medical_history) {
                $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
                    ->where('physician_id', $this->physician->id)
                    ->count();

                if ($medical_appointments > 0) {
                    return $medical_history;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
