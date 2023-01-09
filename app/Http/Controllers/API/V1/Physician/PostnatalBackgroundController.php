<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\PosnatalBackgroundResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;
use App\Models\PostnatalBackground;
use Illuminate\Http\Request;

class PostnatalBackgroundController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician');

        $this->physician = Physician::where('user_id', auth()->id())->first();
    }

    public function index()
    {
        #CODE
    }

    public function show($medical_history_id)
    {
        try {
            $medical_history = MedicalHistory::where('id', $medical_history_id)->firstOrFail();

            // SE ASEGURA QUE EL MÉDICO PUEDA VER INFORMACIÓN SÓLO DEL PACIENTE QUE HA ATENDIDO
            $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            
            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }
    
            return (new PosnatalBackgroundResource($medical_history->postnatal_background))->additional(['message' => 'Antecedente postnatal.']);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
       
    }
}
