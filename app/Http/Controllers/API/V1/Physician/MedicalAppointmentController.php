<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\MedicalAppointmentResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
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

    public function index($medical_history_id)
    {
        try {
            $patient_id = MedicalHistory::where('id', $medical_history_id)->value('id');

            $medical_apopointment = MedicalAppointment::where('patient_id', $patient_id)
                ->where('physician_id', $this->physician->id)
                ->get(); 
       
            return (MedicalAppointmentResource::collection($medical_apopointment))
                ->additional(['message' => 'Citas médicas.']);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
