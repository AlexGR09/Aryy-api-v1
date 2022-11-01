<?php

namespace App\Http\Controllers\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\Physician\PhysicianRequest;
use App\Http\Resources\Physician\PhysicianResource;
use App\Models\Physician;
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
                    'country_code' => $request->country_code,
                    'phone_number' => $request->phone_number,
                    'c1_license' => $request->c1_license,
                    'a1_license' => $request->a1_license,
                    'city_id' => $request->city_id
                ]);
                $this->user->syncRoles(['User', 'Physician']);
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
            if ($this->user->hasRole('Physician')) {
                $physician = Physician::where('user_id', $this->user->id)->get();
                return ( PhysicianResource::collection($physician))->additional(['message' => 'Mi perfil médico.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
