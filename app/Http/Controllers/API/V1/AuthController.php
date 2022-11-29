<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\RegisterRequest;
use App\Http\Requests\API\V1\Auth\UpdateProfileRequest;
use App\Http\Resources\API\V1\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function login(LoginRequest $request)
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

    public function register(RegisterRequest $request)
    {
        try {
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->assignRole('User');
            $user->save();
            // ASIGNAR ROL DE ACUERDO AL TIPO DE USUARIO
            switch ($request->type_user) {
                case 'Patient':
                    $user->assignRole('NewPatient');
                    break;
                case 'Physician':
                    $user->country_code = $request->country_code;
                    $user->phone_number = $request->phone_number;
                    $user->assignRole('NewPhysician');
                    break;
                default:
                    break;
            }
            // GENERA UN TOKEN PARA EL USUARIO Y LO GUARDA EN LA DB
            $token = $user->createToken('authToken')->plainTextToken;
            $user->remember_token = $token; 
            $user->update();
            return (new UserResource($user))->additional([
                'message' => 'Usuario registrado con éxito.',
                'access_token' => $token ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            if ($this->user->hasPermissionTo('show user profile')) {
                return (new UserResource($this->user))->additional(['message' => 'My profile']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            if ($this->user->hasPermissionTo('edit user profile')) {
                DB::beginTransaction();
                $this->user->name = $request->name;
                $this->user->last_name = $request->last_name;
                $this->user->gender = $request->gender;
                $this->user->birthday = $request->birthday;
                $this->user->country_code = $request->country_code;
                $this->user->phone_number = $request->phone_number;
                $this->user->email = $request->email;
                // Si se recibe una contraseña
                if ($request->password) {
                    $this->user->password = bcrypt($request->password);
                    $this->logout(); // Invocación del método logout
                }
                $this->user->save();
                DB::commit();
                return (new UserResource($this->user))->additional(['message' => 'Perfil actualizado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            // FALTA REGRESAR LA IMAGEN BORRADA
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy()
    {
        try {
            if ($this->user->hasPermissionTo('delete user profile')) {
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
            DB::beginTransaction();
            $this->user->tokens()->delete();
            $this->user->remember_token = null;
            $this->user->save();
            DB::commit();
            return (new UserResource($this->user))->additional(['message' => 'Cierre de sesión exitoso, adiós']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
