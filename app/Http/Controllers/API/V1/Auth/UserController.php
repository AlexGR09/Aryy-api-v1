<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\UpdateUserRequest;
use App\Http\Resources\API\V1\Auth\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->middleware('role:User');
    }

    public function show()
    {
        try {
            return (new UserResource($this->user))->additional(['message' => 'My profile']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(UpdateUserRequest $request)
    {
        try {
            # FALTA FUNCIÓN DE VERIFICACIÓN AL CAMBIAR NÚMERO DE TELÉFONO Y CAMBIAR EL NOMBRE DE LA CARPETA
            $this->user->update($request->validated());

            if ($request->password) $this->logout(); // INVOCACIÓN DEL MÉTODO LOGOUT
            
            return (new UserResource($this->user))->additional(['message' => 'Perfil actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy()
    {
        try {
            $this->folderUserDelete($this->user->getRoleNames());

            $this->user->delete();

            $this->logout();

            return (new UserResource($this->user))->additional(['message' => 'Usuario eliminado con éxito, adiós.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function logout()
    {
        try {
            DB::beginTransaction();

            $this->user->tokens()->delete();
            $this->user->update([
                'remember_token' => NULL
            ]);
          
            DB::commit();
            return (new UserResource($this->user))->additional(['message' => 'Cierre de sesión exitoso, adiós']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function  folderUserDelete($user_roles)
    {
        $to = '//recycle_bin//' . $this->user->user_folder;

        switch ($user_roles) {

            case $user_roles->contains('Physician') || $user_roles->contains('NewPhysician'):
                $from = '//users//physicians//' . $this->user->user_folder;
                Storage::move($from, $to);
                break;

            case $user_roles->contains('Patient') || $user_roles->contains('NewPatient'):
                $from = '//users//patients//' . $this->user->user_folder;
                Storage::move($from, $to);
                break;
            
            default:
            return response()->json(['message' => 'rol no encontrado'], 503);
                break;
        }
    }
}
