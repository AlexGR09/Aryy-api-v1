<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckPatientController extends Controller
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
            $patient = Patient::findOrFail($request->patient_id);
            // ACTUALIZA LOS ROLES DEL USUARIO
            $user = User::where('id', $patient->user_id)->findOrFail();

            $user->syncRoles(['User', 'Patient']);
            DB::commit();

            return response()->json(['message' => 'Paciente verificado con éxito.'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
