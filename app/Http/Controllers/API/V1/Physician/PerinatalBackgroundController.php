<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PerinatalBackgroundRequest;
use App\Http\Resources\API\V1\Physician\PerinatalBackgroundResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\PerinatalBackground;
use App\Models\Physician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerinatalBackgroundController extends Controller
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

    public function store(PerinatalBackgroundRequest $request)
    {
        try {
            DB::beginTransaction();
            /* $medicalHistory = MedicalHistory::where('patient_id', $request->patient_id)->FirstOrFail();
            $cita = MedicalAppointment::where('patient_id', $request->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($cita < 1) {
                return response()->json(['Petición incorrecta']);
            } */
            $todaydatetime = date('Y-m-d');

            $medicalAppointment = MedicalAppointment::where('patient_id', $request->patient_id)
                ->where('physician_id', $this->physician->id)
                ->first();
            //se compara la fecha actual con la fecha de la cita
            if ($medicalAppointment->appointment_date != $todaydatetime) {
                return "Petición incorrecta";
            }
            $medicalHistory = MedicalHistory::where('patient_id', $request->patient_id)->FirstOrFail();
            $perinatalBackground = PerinatalBackground::create([
                'last_menstrual_cycle' => $request->last_menstrual_cycle,
                'cycle_time' => $request->cycle_time,
                'contraceptive_method_use' => $request->contraceptive_method_use,
                'assisted_conception' => $request->assisted_conception,
                'final_ppf' => $request->final_ppf,
            ]);
            $medicalHistory->perinatal_background_id = $perinatalBackground->id;
            $medicalHistory->save();
            DB::commit();
            return (new PerinatalBackgroundResource($perinatalBackground))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            DB::rollback();
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
            $perinatalBackground  = PerinatalBackground::where('id', $medical_history->perinatal_background_id)
                ->first();
            return (new PerinatalBackgroundResource($perinatalBackground))->additional(['message' => 'Informacion encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function update(PerinatalBackgroundRequest $request, $medical_history_id)
    {
        try {
            DB::beginTransaction();
            $medical_history = MedicalHistory::where('id', $medical_history_id)->firstOrFail();
            $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }
            $perinatalBackground  = PerinatalBackground::where('id', $medical_history->perinatal_background_id)
                ->first();
            $perinatalBackground->last_menstrual_cycle = $request->last_menstrual_cycle;
            $perinatalBackground->cycle_time = $request->cycle_time;
            $perinatalBackground->contraceptive_method_use = $request->contraceptive_method_use;
            $perinatalBackground->assisted_conception = $request->assisted_conception;
            $perinatalBackground->final_ppf = $request->final_ppf;
            $perinatalBackground->save();
            DB::commit();
            return (new PerinatalBackgroundResource($perinatalBackground))->additional(['message' => 'Informacion actualizada con exito.']);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        //
    }
}
