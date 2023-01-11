<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\V1\Physician\PhysicianStoreRequest;
use App\Http\Requests\API\V1\Physician\PhysicianUpdateRequest;
use App\Http\Resources\API\V1\Physician\PhysicianResource;
use App\Models\Physician;
use App\Models\User;
use Illuminate\Http\Request;

class PhysicianProfileController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());

        $this->middleware('role:NewPhysician')->only(['store']);
        $this->middleware('permission:show physician profile')->only(['show']);
        $this->middleware('role:Physician')->only(['update']);
    }

    public function store(PhysicianStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $physician = $this->user->physician()->create([
                'professional_name' => $request->professional_name,
                'is_verified' => 'in_verification'
            ]);

            // CREA LAS ESPECIALIDADES DEL MÉDICO EN LA TABLA PIVOTE
            $physician->specialties()->attach($request->specialties);
    
            $this->user->syncRoles(['User', 'PhysicianInVerification']);
            
            DB::commit();
            return (new PhysicianResource($physician))->additional(['message' => 'Perfil médico creado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(User $physician)
    {
        try {
            $message = 'Mi perfil médico.';
            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();

            if ($this->user->hasRole('PhysicianInVerification')) {
                $message = 'Su perfil médico está en proceso de verificación, esto puede tomar un par de días. Por favor, tenga paciencia, nosotros le avisaremos.';
            }
            return (new PhysicianResource($physician))->additional(['message' => $message]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PhysicianUpdateRequest $request) 
    {
        try {
            DB::beginTransaction();
            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();

            $physician->update($request->validated());
            
            // CONSULTA LOS REGISTROS EXISTENTES DE ESPECIALIDADES-MÉDICO
            $previousSpecialties = $physician->physician_specialty->makeHidden(['institution'])->toArray();

            // FORMATEA LAS ESPECIALIDADES DEL REQUEST
            $currentSpecialties = $this->specialtiesFormat($request->specialties);

            // SI LAS ESPECIALIDADES PREVIAS DEL MÉDICO SON DIFERENTES A LA ESPECIALIDADES DEL REQUEST
            if ($previousSpecialties != $currentSpecialties) {
                $this->user->syncRoles(['User', 'PhysicianInVerification']);
                $physician->update(['is_verified' =>  'in_verification']);
            }

            $physician->specialties()->sync($request->specialties);

            DB::commit();
            return (new PhysicianResource($physician))->additional(['message' => 'Perfil médico actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    // FORMATEA EL ARRAY DE LA SOLICITUD SPECIALTIES (specialty_id, license)
    public function specialtiesFormat($specialties) 
    {
        $currentSpecialties = [];
        foreach ($specialties as $key => $specialty) {
            unset($specialty['institution']);
            $currentSpecialties += [ $key => $specialty];
        }
        return $currentSpecialties;
    }
}
