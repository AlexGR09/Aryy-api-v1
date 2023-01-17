<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\MedicalAppointmentResource;
use App\Models\MedicalAppointment;
use App\Models\Physician;
use Illuminate\Http\Request;

class MedicalAppointmentController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician');

        $this->physician = Physician::where('user_id', auth()->id())->first();
    }

    public function index($patient_id)
    {
        try {
            $medical_appointment = MedicalAppointment::where('patient_id', $patient_id)
                ->where('physician_id', $this->physician->id)
                ->orderBy('appointment_date', 'DESC')
                ->get(); 
       
            return (MedicalAppointmentResource::collection($medical_appointment))
                ->additional(['message' => 'Citas médicas.']);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($medical_appointment_id)
    {
        try {
            return (new MedicalAppointmentResource($this->medical_appointment($medical_appointment_id)))
                ->additional(['message' => 'Cita médica encontrada.']);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function updateNote(Request $request, $medical_appointment_id)
    {
        try {
            $medical_appointment = $this->medical_appointment($medical_appointment_id);

            $medical_appointment->update(['note' => $request->note]);

            return (new MedicalAppointmentResource($medical_appointment))
                ->additional(['message' => 'Nota de la cita médica actualizada.']);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function medical_appointment($id)
    {
        return MedicalAppointment::where('id', $id)
            ->where('physician_id', $this->physician->id)
            ->first(); 
    }

}
