<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function login(AuthRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Credenciales no válidas.'], 503);
            }
            $token = $user->createToken('authToken')->plainTextToken;
            $user->remember_token = $token;
            $user->save();
            return (new UserResource($user))->additional([
                  'message' => 'Bienvenido a Aryy.',
                  'access_token' => $token ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function register(AuthRequest $request)
    {
        try {
            $mobile = $request->mobile; // Es Mobile o SPA
            $user = new User();
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->assignRole('User');
            if ($mobile) {
                $user->assignRole('NewPatient');
            }
            if (!$mobile) {
                $user->assignRole('NewPhysician');
            }
            $user->save();
            return (new UserResource($user))->additional(['message' => 'Usuario registrado con éxito']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            if ($this->user->hasPermissionTo('show profile')) {
                return (new UserResource($this->user))->additional(['message' => 'My profile']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

     public function update(AuthRequest $request)
     {
         try {
             if ($this->user->hasPermissionTo('edit profile')) {
                 $this->user->name = $request->name;
                 $this->user->last_name = $request->last_name;
                 $this->user->email = $request->email;
                 if ($request->password) {
                     $this->user->password = bcrypt($request->password);
                     $this->logout(); // Invocación del método logout
                 }
                 $this->user->save();
                 return (new UserResource($this->user))->additional(['message' => 'Perfil actualizado con éxito.']);
             }
             return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
         } catch (\Throwable $th) {
             return response()->json(['error' => $th->getMessage()], 503);
         }
     }

     public function destroy()
     {
         try {
             if ($this->user->hasPermissionTo('delete profile')) {
                 $this->user->delete();
                 return (new UserResource($this->user))->additional(['message' => 'Usuario eliminado con éxito, adiós.']);
             }
             return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
         } catch (\Throwable $th) {
             return response()->json(['error' => $th->getMessage()], 503);
         }
     }

     public function logout()
     {
         try {
             $this->user->tokens()->delete();
             $this->user->remember_token = null;
             $this->user->save();
             return (new UserResource($this->user))->additional(['message' => 'Cierre de sesión exitoso, adiós']);
         } catch (\Throwable $th) {
             return response()->json(['error' => $th->getMessage()], 503);
         }
     }
}
