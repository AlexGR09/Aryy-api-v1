<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PhysicianCreateRequest;
// use App\Http\Requests\API\V1\Physician\PhysicianRequest;
use App\Http\Requests\API\V1\Physician\PhysicianUpdateRequest;
use App\Http\Resources\API\V1\Physician\PhysicianResource;
use App\Models\Physician;
use App\Models\PhysicianSpecialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhysicianController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:NewPhysician')->only(['store']);
        $this->middleware('permission:show physician profile')->only(['show']);
        $this->middleware('role:Physician')->only(['update']);
    }

    public function store(PhysicianCreateRequest $request)
    {
        try {
            DB::beginTransaction();
            $physician = new Physician();
            $physician->user_id = $this->user->id; 
            $physician->professional_name = $request->professional_name;
            $physician->is_verified = 'in_verification';
            $physician->save();        
            // CREA LAS ESPECIALIDADES DEL MÉDICO EN LA TABLA PIVOTE
            foreach ($request->specialties as $specialty) {
                $physician->specialties()->attach([
                    $specialty['specialty_id']  => [     
                        'physician_id' => $physician->id,
                        'license' => $specialty['license'],
                        'institution' => $specialty['institution']
                    ]
                ]);
            }    
            $this->user->syncRoles(['User', 'PhysicianInVerification']);
            DB::commit();
            return (new PhysicianResource($physician))->additional(['message' => 'Perfil médico creado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            $message = 'Mi perfil médico.';
            $physician = Physician::where('user_id', $this->user->id)->first();
            if ($this->user->hasRole('PhysicianInVerification')) {
                $message = 'Su perfil médico está en proceso de verificación, esto puede tomar un par de días. Por favor, tenga paciencia, nosotros le avisaremos.';
            }
            return (new PhysicianResource($physician))->additional(['message' => $message]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PhysicianUpdateRequest $request) {
        try {
            DB::beginTransaction();
            $physician = Physician::findOrFail($request->physician_id);
            $physician->professional_name = $request->professional_name;
            $physician->certificates = json_encode($request->certificates);
            $physician->biography = $request->biography;
            $physician->recipe_template = $request->recipe_template;
            $physician->social_networks = json_encode($request->social_networks);
            $physician->is_verified = 'verified';

            return $request;
            // CONSULTA LOS REGISTROS EXISTENTES DE ESPECIALIDADES-MÉDICO
            $previousSpecialties = PhysicianSpecialty::where('physician_id', $physician->id)->get()->toArray();
            if ($previousSpecialties != $request->specialties) {
                // SINCRONIZA LAS ESPECIALIDADES DEL MÉDICO EN LA TABLA PIVOTE
                $specialties = [];
                foreach ($request->specialties as $specialty) { 
                    $specialties += [ 
                        $specialty['specialty_id'] => [
                            'physician_id' => $physician->id,
                            'license' => $specialty['license'],
                            'institution' => $specialty['institution']
                        ]
                    ];
                }
                $physician->specialties()->sync($specialties);
                $this->user->syncRoles(['User', 'PhysicianInVerification']);
                $physician->is_verified = 'in_verification';
            }
            $physician->save();
            DB::commit();
            return (new PhysicianResource($physician))->additional(['message' => 'Perfil médico actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
        
    }
}
