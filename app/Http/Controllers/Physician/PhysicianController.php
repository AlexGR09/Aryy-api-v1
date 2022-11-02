<?php

namespace App\Http\Controllers\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\Physician\PhysicianRequest;
use App\Http\Resources\Physician\PhysicianResource;
use App\Models\Physician;
use App\Models\PhysicianSpecialty;
use App\Models\SpecialtiesPhysician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class PhysicianController extends Controller
{
    protected $user;
    
    public function __construct() {
        $this->user = auth()->user();
    }

    public function store(PhysicianRequest $request) {
        try {
            if ($this->user->hasRole('NewPhysician')) {
                DB::beginTransaction();
                $physician = Physician::create([
                    'user_id' => $this->user->id,
                    'professional_name' => $request->professional_name,
                    'certificates' => $request->certificates,
                    'biography' => $request->biography,
                    'recipe_template' => $request->recipe_template,
                    'social_networks' => $request->social_networks,
                    'is_verified' => 'in_verification'
                ]);
                // DB::table('physician_specialty')->insert([
                //     $request->specialties
                // ]);
                // REALIZAR UN CICLO AQUÍ PARA INSERTAR 
                return $request->specialties->specialty_id;

                PhysicianSpecialty::create([
                    'specialty_id' => $request->specialties->specialty_id
                    // $request->specialties
                ]);
                // SpecialtiesPhysician
                $this->user->syncRoles(['User', 'NewPhysicianInVerification']);
                DB::commit();
                return (new PhysicianResource($physician))->additional(['message' => 'Perfil médico creado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show() {
        try {
            if ($this->user->hasPermissionTo('show physician')) {
                $physician = Physician::where('user_id', $this->user->id)->get();
                return ( PhysicianResource::collection($physician))->additional(['message' => 'Mi perfil médico.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
