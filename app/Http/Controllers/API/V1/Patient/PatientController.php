<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PatientRequest;
use App\Http\Requests\API\V1\Patient\UserRequest;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Models\City;
use App\Models\Patient;
use App\Models\OccupationPatient;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        
        $this->middleware('permission:show patient profile')->only(['show']);
        $this->middleware('role:NewPatient')->only(['store']);
        $this->middleware('permission:edit patient profile')->only(['update']);
    }

    public function store(Request $request)
    {
        try {
            /* if ($this->user->hasRole('NewPatient')) { */
                DB::beginTransaction();
                $patient = new Patient();
                $patient->user_id = $this->user->id;
                $patient->emergency_number = $request->emergency_number;
                $country = $request->country;
                $patient->city_id = $request->city_id;
                $patient->save();
                $this->user->syncRoles(['User', 'Patient']);

                $user = User::where('id',$this->user->id)->first();
                $user->full_name = $request->full_name;
                $user->gender = $request->gender;
                $user->birthday = $request->birthday;
                $user->country_code = $request->country_code;
                $user->phone_number = $request->phone_number;
                $user->save();

                $patient_occupation = new OccupationPatient();
                $patient_occupation->occupation_id = $request->occupation_id;
                $patient_occupation->patient_id = $patient->id;
                $patient_occupation->save();



                DB::commit();
                return (new PatientResource($patient))->additional(['message' => 'Perfil de paciente creado con éxito.']);
            /* }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403); */
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            /* if ($this->user->hasPermissionTo('show patient profile')) { */
                $patient = Patient::where('user_id', $this->user->id)->get();
                return (PatientResource::collection($patient))->additional(['message' => 'Mi perfil de paciente.']);
            /* }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403); */
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request)
    {

        /* return response()->json("FUNCIONALIDAD EN CREACIÓN"); */
         try {
        /*if ($this->user->hasPermissionTo('edit patient profile')) {*/                
                DB::beginTransaction();

                 $patient = Patient::where('user_id',$this->user->id)->first();
                 
                 $patient->address = json_encode($request->address);
                 $patient->zip_code = $request->zip_code;
                 $patient->emergency_number = $request->emergency_number;
                 $patient->city_id = $request->city_id;
                 $patient->country_code = $request->country_code;
                 $patient->id_card = json_encode($request->id_card);
                 $patient->save();

                 $user = User::where('id',$this->user->id)->first();
                 $user->full_name = $request->full_name;
                 $user->gender = $request->gender;
                 $user->birthday = $request->birthday;
                 $user->country_code = $request->country_code;
                 $user->phone_number = $request->phone_number;
                 $user->save();

                 $patient_occupation = OccupationPatient::where('patient_id',$patient->id)->first();
                 $patient_occupation->occupation_id = $request->occupation_id;
                 $patient_occupation->patient_id = $patient->id;
                 $patient_occupation->save();

                 DB::commit();
                 return (new PatientResource($patient))->additional(['message' => 'paciente actualizado con éxito.']);
             /* }
             return response()->json(['message' => 'No puedes realizar esta acción.'], 403); */
         } catch (\Throwable $th) {
             DB::rollBack();
             return response()->json(['error' => $th->getMessage()], 503);
         }
    }


}
