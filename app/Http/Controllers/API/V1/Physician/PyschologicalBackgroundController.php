<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PyschologicalBackgroundRequest;
use App\Http\Resources\API\V1\Physician\PyschologicalBackgroundResource;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;
use App\Models\PyschologicalBackground;
use Illuminate\Http\Request;

class PyschologicalBackgroundController extends Controller
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

    public function store(PyschologicalBackgroundRequest $request)
    {
        try {
            DB::beginTransaction();
            /* $medicalappointment = MedicalAppointment::where('patient_id', $request->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($medicalappointment < 1) {
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
            $medicalHistory = MedicalHistory::where('patient_id', $request->patient_id)->firstOrFail();
            $pyschological = $medicalHistory->pyschologicalbackground()->create($request->validated());
            $medicalHistory->pyschological_background_id = $pyschological->id;
            $medicalHistory->save();
            DB::commit();
            return (new PyschologicalBackgroundResource($pyschological))->additional(['message' => 'Registro creado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function show($medical_history_id)
    {
        try {
            $medicalHistory = MedicalHistory::where('id', $medical_history_id)->firstOrFail();
            // SE ASEGURA QUE EL MÉDICO PUEDA VER INFORMACIÓN SÓLO DEL PACIENTE QUE HA ATENDIDO
            $medical_appointments = MedicalAppointment::where('patient_id', $medicalHistory->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();

            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }
            $pyschological = PyschologicalBackground::where('id', $medicalHistory->pyschological_background_id)->first();
            DB::commit();
            return (new PyschologicalBackgroundResource($pyschological))->additional(['message' => 'Registro encontrado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function update(PyschologicalBackgroundRequest $request, $medical_history_id)
    {
        try {
            DB::beginTransaction();
            $medicalHistory = MedicalHistory::where('id', $medical_history_id)->firstOrFail();
            // SE ASEGURA QUE EL MÉDICO PUEDA VER INFORMACIÓN SÓLO DEL PACIENTE QUE HA ATENDIDO
            $medical_appointments = MedicalAppointment::where('patient_id', $medicalHistory->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($medical_appointments < 1) {
                return response()->json(['Petición incorrecta']);
            }
            $pychologicalBackground = PyschologicalBackground::where('id', $medicalHistory->pyschological_background_id)->first();
            $pychologicalBackground->family_history = $request->family_history;
            $pychologicalBackground->disease_awareness = $request->disease_awareness;
            $pychologicalBackground->areas_affected_by_the_disease = $request->areas_affected_by_the_disease;
            $pychologicalBackground->family_support_group = $request->family_support_group;
            $pychologicalBackground->family_group_of_the_patient = $request->family_group_of_the_patient;
            $pychologicalBackground->aspects_of_social_life = $request->aspects_of_social_life;
            $pychologicalBackground->aspects_of_working_life = $request->aspects_of_working_life;
            $pychologicalBackground->relationship_whit_authority = $request->relationship_whit_authority;
            $pychologicalBackground->inpulse_control = $request->inpulse_control;
            $pychologicalBackground->frustration_management = $request->frustration_management;
            $pychologicalBackground->save();
            DB::commit();
            return (new PyschologicalBackgroundResource($pychologicalBackground))->additional(['message' => 'Registro actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        //
    }
}
