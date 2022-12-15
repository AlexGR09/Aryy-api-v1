<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\HealthInsuranceResource;
use App\Models\HealthInsurance;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HealthInsuranceController extends Controller
{
    public ?\Illuminate\Contracts\Auth\Authenticatable $user;

    public function __construct()
    {
        $this->user = auth()->user();
        //$this->middleware('permission:show hereditary background')->only(['show']);
        $this->middleware('role:Patient')->only(['store', 'show', 'update']);
        //$this->middleware('permission:edit hereditary background')->only(['update']);
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $health_insurance = HealthInsurance::create([
                'insurance_number' => $request->insurance_number,
                'insurance_id' => $request->insurance_id,
                'patient_id' => $patient->id,
            ]);

            return (new HealthInsuranceResource($health_insurance))->additional(['message' => 'Informacion guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $health_insurance = HealthInsurance::where('patient_id', $patient->id)->first();
            if ($health_insurance) {
                return (new HealthInsuranceResource($health_insurance))->additional(['message' => '..']);
            }
            return response()->json(['error'=>'La informacion no se encontro'], 503);;
           } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request)
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $health_insurance = HealthInsurance::where('patient_id', $patient->id)->first();
            $health_insurance->insurance_number = $request->insurance_number;
            $health_insurance->insurance_id = $request->insurance_id;

            return (new HealthInsuranceResource($health_insurance))->additional(['message' => 'Informacion actualizada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy()
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $health_insurance = HealthInsurance::where('patient_id', $patient->id)->first();
            $health_insurance->delete();

            return (new HealthInsuranceResource($health_insurance))->additional(['message' => 'Informacion eliminada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}

