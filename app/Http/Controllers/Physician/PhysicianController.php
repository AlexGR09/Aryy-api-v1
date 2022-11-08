<?php

namespace App\Http\Controllers\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\Physician\PhysicianRequest;
use App\Http\Resources\Physician\PhysicianResource;
use App\Models\Physician;
use App\Models\PhysicianSpecialty;
use Illuminate\Support\Facades\DB;

class PhysicianController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function store(PhysicianRequest $request)
    {
        try {
            if ($this->user->hasRole('NewPhysician')) {
                DB::beginTransaction();
                $physician = new Physician();
                $physician->user_id = $this->user->id; // SE PASARÁ COMO PARAMETRO
                $physician->professional_name = $request->professional_name;
                $physician->certificates = json_encode($request->certificates);
                $physician->biography = $request->biography;
                $physician->recipe_template = $request->recipe_template;
                $physician->social_networks = json_encode($request->social_networks);
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
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            if ($this->user->hasPermissionTo('show physician')) {
                $message = 'Mi perfil médico.';
                $physician = Physician::where('user_id', $this->user->id)->get();
                if ($this->user->hasRole('PhysicianInVerification')) {
                    $message = 'Su perfil médico está en proceso de verificación, esto puede tomar un par de días. Por favor, tenga paciencia, nosotros le avisaremos.';
                }
                return (PhysicianResource::collection($physician))->additional(['message' => $message]);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PhysicianRequest $request) {
        try {
            if ($this->user->hasRole('Physician')) {
                DB::beginTransaction();
                $physician = Physician::where('user_id', $this->user->id)->first();
                $physician->professional_name = $request->professional_name;
                $physician->certificates = json_encode($request->certificates);
                $physician->biography = $request->biography;
                $physician->recipe_template = $request->recipe_template;
                $physician->social_networks = json_encode($request->social_networks);
                $physician->is_verified = 'verified';
                $physician->save();
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
                    $physician->save();
                }
                DB::commit();
                return (new PhysicianResource($physician))->additional(['message' => 'Perfil médico actualizado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
        
    }
}
