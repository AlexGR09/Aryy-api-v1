<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PerinatalBackgroundRequest;
use App\Http\Resources\API\V1\Physician\PerinatalBackgroundResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\PerinatalBackground;
use App\Models\Physician;
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
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function store(PerinatalBackgroundRequest $request)
    {
        try {
            DB::beginTransaction();
            $todaydatetime = date('Y-m-d');

            /* $medicalAppointment = MedicalAppointment::where('patient_id', $request->patient_id)
                ->where('physician_id', $this->physician->id)
                ->first();
            //se compara la fecha actual con la fecha de la cita
            if ($medicalAppointment->appointment_date != $todaydatetime) {
                return "Petición incorrecta";
            } */
            $medicalHistory = $this->medicalhistory($request->patient_id);
            if (! $medicalHistory || $medicalHistory->perinatalBackground) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }
            $perinatalBackground = PerinatalBackground::create($request->validated());
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
            $medicalHistory = $this->medicalhistory($medical_history_id);
            $perinatalBackground = $medicalHistory->perinatalBackground;
            if (! $perinatalBackground) {
                return response()->json(['message' => 'No se encontraron resultados'], 404);
            }

            return (new PerinatalBackgroundResource($perinatalBackground))->additional(['message' => 'Informacion encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function update(PerinatalBackgroundRequest $request, $medical_history_id)
    {
        try {
            DB::beginTransaction();
            $medicalHistory = $this->medicalhistory($medical_history_id);
            $perinatalBackground = $medicalHistory->perinatalBackground;
            $perinatalBackground->update($request->validated());
            $perinatalBackground->save();
            DB::commit();

            return (new PerinatalBackgroundResource($perinatalBackground))->additional(['message' => 'Informacion actualizada con exito.']);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json(['error' => $th->getMessage()], 400);
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
