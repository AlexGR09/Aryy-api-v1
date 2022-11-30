<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientOccupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OccupationPatientController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id', $this->user->id)->first();
                DB::beginTransaction();
                $patient_occupation = new PatientOccupation ();
                $patient_occupation->occupations_id = $request->occupations_id;
                $patient->patients_id = $patient->id;
                return $patient;
                DB::commit();
                //return (new PathologicalBackgroundResoucer($pathological_background))->additional(['message' => 'Informacion guardada con exito.']);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
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
