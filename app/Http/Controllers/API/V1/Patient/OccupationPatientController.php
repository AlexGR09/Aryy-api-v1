<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\OccupationPatientResource;
use App\Models\Patient;
use App\Models\OccupationPatient;
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
                $patient_occupation = new OccupationPatient ();
                $patient_occupation->occupation_id = $request->occupation_id;
                $patient_occupation->patient_id = $patient->id;
                $patient_occupation->save();
                /* return $patient_occupation */;
                DB::commit();
                return (new OccupationPatientResource($patient_occupation))->additional(['message' => 'Informacion guardada con exito.']);
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
