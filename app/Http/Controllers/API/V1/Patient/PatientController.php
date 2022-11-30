<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PatientRequest;
use App\Http\Requests\API\V1\Patient\UserRequest;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show patient')->only(['show']);
        $this->middleware('role:NewPatient')->only(['store']);
        $this->middleware('role:Patient')->only(['update']);
    }

    public function store(PatientRequest $request)
    {
        try {
            DB::beginTransaction();
            $patient = new Patient();
            $patient->user_id = auth()->id();
            $patient->address = json_encode($request->address);
            $patient->zip_code = $request->zip_code;
            $patient->emergency_number = $request->emergency_number;
            $patient->city_id = $request->city_id;
            $patient->id_card = json_encode($request->id_card);
            $patient->save();
            $this->user->syncRoles(['User', 'Patient']);
            DB::commit();
            return (new PatientResource($patient))->additional(['message' => 'Perfil de paciente creado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            $patient = Patient::where('user_id', auth()->id())->get();
            return (PatientResource::collection($patient))->additional(['message' => 'Mi perfil de paciente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PatientRequest $request)
    {
         try {   
                DB::beginTransaction();

                 $patient = Patient::where('user_id',auth()->id())->first();
                 
                 $patient->address = json_encode($request->address);
                 $patient->zip_code = $request->zip_code;
                 $patient->emergency_number = $request->emergency_number;
                 $patient->city_id = $request->city_id;
                 $patient->country_code = $request->country_code;
                 $patient->id_card = json_encode($request->id_card);
                 $patient->save();

                 $user = User::where('id', auth()->id())->first();
                 $user->full_name = $request->full_name;
                 $user->gender = $request->gender;
                 $user->birthday = $request->birthday;
                 $user->country_code = $request->country_code;
                 $user->phone_number = $request->phone_number;
                 $user->save();

                 DB::commit();
                 return (new PatientResource($patient))->additional(['message' => 'paciente actualizado con éxito.']);
             
         } catch (\Throwable $th) {
             DB::rollBack();
             return response()->json(['error' => $th->getMessage()], 503);
         }
    }
}
