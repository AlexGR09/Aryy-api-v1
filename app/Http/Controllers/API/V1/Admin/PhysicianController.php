<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Physician;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhysicianController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function check(Request $request) 
    {
        try {
            if ($this->user->hasRole('Administrator')) {
                DB::beginTransaction();
                // ACTUALIZA EL STATUS DE VERIFICACIÓN DEL MÉDICO
                $physician = Physician::where('id', $request->physician_id)->first();
                $physician->is_verified = 'verified';
                $physician->save();
                // ACTUALIZA LOS ROLES DEL USUARIO CON PERFIL DE MÉDICO
                $user = User::where('id', $physician->user_id)->first();
                $user->syncRoles(['User', 'Physician']);
                DB::commit();
                return response()->json(['message' => 'Médico verificado con éxito.'], 200);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
        
    }
}
