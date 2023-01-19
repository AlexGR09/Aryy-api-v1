<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Physician;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PhysicianController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Administrator');
    }

    public function checkOne($id)
    {
        try {
            DB::beginTransaction();
            // ACTUALIZA EL STATUS DE VERIFICACIÓN DEL MÉDICO
            $physician = Physician::findOrFail($id);
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

    // public function checkAll()
    // {
    //     try {
    //         DB::table('physicians')
    //             ->where('is_verified', 'in_verification')
    //             ->update(array('is_verified' => 'verified'));

    //         return response()->json(['message' => 'Médicos verificados con éxito.'], 200);
    //     } catch (\Throwable $th) {
    //         return response()->json(['error' => $th->getMessage()], 503);
    //     }
    // }
}
