<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\HealthInsuranceResource;
use App\Models\HealthInsurance;
use App\Models\Insurance;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HealthInsuranceController extends Controller
{
    public ?\Illuminate\Contracts\Auth\Authenticatable $user;

    public function __construct()
    {
        $this->user = auth()->user();

        $this->middleware('role:Patient')->only([
            'store',
            'show',
            'update',
        ]);
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();

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

    public function show($id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $health_insurance = HealthInsurance::where('patient_id', $patient->id)->firstOrFail();

            return (new HealthInsuranceResource($health_insurance))->additional(['message' => 'Datos de seguro medico']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $health_insurance = HealthInsurance::where('patient_id', $patient->id)->firstOrFail();
            $health_insurance->insurance_number = $request->insurance_number;
            $health_insurance->insurance_id = $request->insurance_id;
            $health_insurance->save();

            return (new HealthInsuranceResource($health_insurance))->additional(['message' => 'Informacion actualizada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy($id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
            $health_insurance = HealthInsurance::where('patient_id', $patient->id)->firstOrFail();
            $health_insurance->delete();

            return (new HealthInsuranceResource($health_insurance))->additional(['message' => 'Informacion eliminada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function health_insurance(Request $request)
    {
        $health_insurance = Insurance::all();

        return $health_insurance;
    }
}
