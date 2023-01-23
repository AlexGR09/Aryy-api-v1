<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\MedicalHistoryResource;
use App\Http\Resources\API\V1\Physician\MedicalHistoryVaccinationResource;
use App\Models\MedicalHistory;
use App\Models\MedicalHistoryVaccination;
use App\Models\Physician;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
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
            $medicalHistory = MedicalHistory::where('patient_id',$patient_id)->first();
            $vaccinationHistory = MedicalHistoryVaccination::where('patient_id',$medicalHistory->patient_id)->get();
            return (new MedicalHistoryResource($medicalHistory));
            //return MedicalAppointmentResource::collection($medical_appointment)->additional(['message' => 'Citas médicas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        //
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