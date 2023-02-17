<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PyschologicalBackgroundRequest;
use App\Http\Resources\API\V1\Physician\PyschologicalBackgroundResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;
use App\Models\PyschologicalBackground;
use Illuminate\Support\Facades\DB;

class PyschologicalBackgroundController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'drugActive',
            'previusMedication',
        ]);
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function store(PyschologicalBackgroundRequest $request)
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
            if (! $medicalHistory || $medicalHistory->pyschologicalBackground) {
                return response()->json(['message' => 'No se encontro historial psicologico de este paciente'], 404);
            }
            $pyschological = $medicalHistory->pyschologicalbackground()->create($request->validated());
            $medicalHistory->pyschological_background_id = $pyschological->id;
            $medicalHistory->save();
            DB::commit();

            return (new PyschologicalBackgroundResource($pyschological))->additional(['message' => 'Antecedentes psiquiatricos guardados con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['Petición incorrecta' => $th->getMessage()], 201);
        }
    }

    public function show($medical_history_id)
    {
        try {
            $medicalHistory = $this->medicalhistory($medical_history_id);
            $pyschological = $medicalHistory->pyschologicalBackground;
            if (! $pyschological) {
                return response()->json(['message' => 'No se encontro el historial psicologico'], 404);
            }
            DB::commit();

            return (new PyschologicalBackgroundResource($pyschological))->additional(['message' => 'Antecedentes psiquiatricos.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function update(PyschologicalBackgroundRequest $request, $medical_history_id)
    {
        try {
            DB::beginTransaction();
            $medicalHistory = $this->medicalhistory($medical_history_id);
            $pyschologicalBackground = PyschologicalBackground::where('id', $medicalHistory->pyschological_background_id)->first();
            $pyschologicalBackground->update($request->validated());
            $pyschologicalBackground->save();
            DB::commit();

            return (new PyschologicalBackgroundResource($pyschologicalBackground))->additional(['message' => 'Registro antecedentes psiquiatricos actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
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
