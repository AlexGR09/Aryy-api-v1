<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\PerinatalBackground;
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
        //consulta la fecha actual
        $todaydatetime = date('Y-m-d');


        $medicalAppointment = MedicalAppointment::where('patient_id', $request->patient_id)
            ->where('physician_id', $this->physician->id)
            ->first();
        //se compara la fecha actual con la fecha de la cita
        if ($medicalAppointment->appointment_date != $todaydatetime) {
            return "No puedes agregar ";
        }
        $medicalHistory = MedicalHistory::where('patient_id', $medicalAppointment->patient_id)->first();
        
        $perinatalBackground = PerinatalBackground::create([
            'last_menstrual_cycle'=>$request->last_menstrual_cycle,
            'cycle_time'=>$request->cycle_time,
            'contraceptive_method_use'=>$request->contraceptive_method_use,
            'assisted_conception'=>$request->assisted_conception,
            'final_ppf'=>$request->final_ppf,
        ]);
        $medicalHistory->perinatal_background_id = $perinatalBackground->id;
        $medicalHistory->save();
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
