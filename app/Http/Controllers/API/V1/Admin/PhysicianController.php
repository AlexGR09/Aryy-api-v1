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
        $this->middleware('role:Administrator')->only(['store']);
    }

    public function check(Request $request)
    {
        try {
            DB::beginTransaction();
            // ACTUALIZA EL STATUS DE VERIFICACIÓN DEL MÉDICO
            $physician = Physician::findOrFail($request->physician_id);
            $physician->update([
                'is_verified' => 'verified',
            ]);
            // ACTUALIZA LOS ROLES DEL USUARIO CON PERFIL DE MÉDICO
            $user = User::where('id', $physician->user_id)->first();
            $user->syncRoles(['User', 'Physician']);
            DB::commit();

            return response()->json(['message' => 'Médico verificado con éxito.'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
