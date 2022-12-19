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
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:User')->only([
            'show',
            'update',
            'destroy',
            'logout',
        ]);

    }

    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Credenciales no válidas.'], 503);
            }

            $token = $user->createToken('authToken')->plainTextToken;
            $user->remember_token = $token;
            $user->save();

            return (new UserResource($user))->additional([
                'message' => 'Bienvenido a Aryy.',
                'access_token' => $token, ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'country_code' => $request->country_code,
                'phone_number' => $request->phone_number
            ]);
            $user->assignRole('User');

            $user_folder = $user->id . '_' . $user->country_code . $user->phone_number;
            // ASIGNAR ROL DE ACUERDO AL TIPO DE USUARIO
            switch ($request->type_user) {
                case 'Patient':
                    $user->assignRole('NewPatient');
                    $directory = '//users//patients//';
                    break;
                case 'Physician':
                    $user->assignRole('NewPhysician');
                    $directory = '//users//physicians//';
                    break;
                default:
                    break;
            }

            // CREA LA CARPETA CORRESPONDIENTE DEL USUARIO
            Storage::makeDirectory($directory . $user_folder);
            // GENERA UN TOKEN PARA EL USUARIO Y LO GUARDA EN LA DB
            $token = $user->createToken('authToken')->plainTextToken;
            $user->remember_token = $token;
            $user->user_folder =  $user_folder;
            $user->save();
            DB::commit();

            return (new UserResource($user))->additional([
                'message' => 'Usuario registrado con éxito.',
                'access_token' => $token, ]);
        } catch (\Throwable $th) {
            Storage::deleteDirectory($directory . $user_folder);
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            return (new UserResource($this->user))->additional(['message' => 'My profile']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->user->full_name = $request->full_name;
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
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy()
    {
        try {
            $roles = $this->user->getRoleNames();

            switch ($roles) {

                case $roles->contains('Physician') || $roles->contains('NewPhysician'):
                    $from = '//users//physicians//' . $this->user->user_folder;
                    $to = '//recycle_bin//' . $this->user->user_folder;
                    break;

                case $roles->contains('Patient') || $roles->contains('NewPatient'):
                    $from = '//users//patients//' . $this->user->user_folder;
                    $to = '//recycle_bin//' . $this->user->user_folder;
                    break;
                
                default:
                return response()->json(['message' => 'rol no encontrado'], 503);
                    break;
            }

            // MUEVE EL DIRECTORIO COMPLETO DEL USUARIO A LA PAPELERA DE RECICLAJE
            Storage::move($from, $to);

            $this->user->delete();

            return (new UserResource($this->user))->additional(['message' => 'Usuario eliminado con éxito, adiós.']);
        } catch (\Throwable $th) {
            Storage::move($to, $from);
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function logout()
    {
        try {
            DB::beginTransaction();
            $this->user->tokens()->delete();
            $this->user->remember_token = NULL;
            $this->user->save();
            DB::commit();

            return (new UserResource($this->user))->additional(['message' => 'Cierre de sesión exitoso, adiós']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

}

