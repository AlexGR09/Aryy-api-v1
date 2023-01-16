<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        //CHECAR COMO MANTENER LA FECHA ACTUAL
        $todaydatetime = date('Y-m-d');
        $medicalAppointment = MedicalAppointment::where('patient_id', $request->patient_id)->firstOrFail();
        // return $medicalAppointment->ppointment_date;
        if ($medicalAppointment->appointment_date != $todaydatetime) {
            return "no puedes iniciar la cita";
        }
        $medicalHistory = MedicalHistory::where('patient_id', $medicalAppointment->patient_id)->first();
        return $medicalHistory;
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
