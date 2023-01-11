<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;
use Illuminate\Http\Request;

class PerinaltalBackgroundController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->physician = Physician::where('user_id', auth()->id())->first();

        $this->middleware('role:Physician');
    }

    public function index()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $medicalappointment = MedicalAppointment::where('patient_id', $id)
            ->where('physician_id', $this->physician->id)
            ->count();
        if ($medicalappointment < 1) {
            return response()->json(['Petición incorrecta']);
        }
        $medicalHistory = MedicalHistory::where('patient_id', $id)->firstOrFail();
        $perinatalBackground = $medicalHistory->perinatalBackground()->create($request->validated());
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
