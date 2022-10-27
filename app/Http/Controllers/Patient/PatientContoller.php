<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\PatientRequest;
use App\Http\Resources\Patient\PatientResource;
use App\Http\Resources\UserResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientContoller extends Controller
{
    protected $user;

    public function __construct() {
        $this->user = auth()->user();
    }
    
    public function index()
    {
        try {
            if($this->user->hasPermissionTo('show profile')){

                if ($this->user->hasPermissionTo('show profile patient')) {
                    /* $user=User::where('id',$this->user->id)->first(); */
                    return (new UserResource($this->user))->additional(['message' => 'Usuario encontrado']);
                }

            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PatientRequest $request)
    {
        try {
            if ($this->user->hasPermissionTo('complete profile patient')) {

                $patient = Patient::where('user_id',$this->user->id)->exists();

                if($patient){
                    return (new PatientResource($request))->additional(['message' => 'El usario paciente ya existe']);
                }
                $patient = Patient::create(['user_id' => $this->user->id]);
                User::where('id',$this->user->id)->first()->assignRole('User','NewPatient');

                return (new PatientResource($patient))->additional(['message' => 'Paciente creado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Patient $patient,User $user)
    {
        
        try {
            if($this->user->hasPermissionTo('show profile')){
                if ($this->user->hasPermissionTo('show profile patient')) {
                /* $user_patient=Patient::where('user_id',$this->user->id)->first();
                return (new PatientResource($user_patient))->additional(['message' => 'Usuario encontrado']); */
                    return (new PatientResource($patient))->additional(['message' => 'Usuario encontrado']);
                }
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, Patient $patient)
    {
       /*  try {
            if ($this->user->hasPermissionTo('complete profile patient')) {
               
                $patient->name = $request->name;
                $patient->save();
            
                DB::commit();
                return (new PatientResource($patient))->additional(['message' => 'paciente actualizado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        } */
    }

    public function destroy($id)
    {
        //
    }
}
