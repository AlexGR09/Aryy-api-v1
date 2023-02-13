<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Auth\LoginRequest;
use App\Http\Requests\API\V1\Auth\RegisterRequest;
use App\Http\Resources\API\V1\Auth\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Correo o contraseña inválida, intente de nuevo.'], 503);
            }

            $token = $user->createToken('authToken')->plainTextToken;
            $user->update([
                'remember_token' => $token,
            ]);

            return (new UserResource($user))->additional([
                'message' => 'Bienvenido a Aryy.',
                'access_token' => $token, 
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create($request->validated());
            $user->assignRole('User');

            $user_folder = $user->id.'_'.$user->country_code.$user->phone_number;

            // CREA LA CARPETA Y ASIGNA EL ROL CORRESPONDIENTE AL USUARIO
            $this->folderUserStorage($request->type_user, $user, $user_folder);

            $token = $user->createToken('authToken')->plainTextToken;
            $user->update([
                'remember_token' => $token,
                'user_folder' => $user_folder,
            ]);

            DB::commit();

            return (new UserResource($user))->additional([
                'message' => 'Usuario registrado con éxito.',
                'access_token' => $token, ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function folderUserStorage($type_user, $user, $user_folder)
    {
        switch ($type_user) {
            case 'Patient':
                $user->assignRole('NewPatient');
                $directory = '//users//patients//';
                Storage::makeDirectory($directory.$user_folder);
                break;
            case 'Physician':
                $user->assignRole('NewPhysician');
                $directory = '//users//physicians//';
                Storage::makeDirectory($directory.$user_folder);
                break;
            default:
                break;
        }
    }
}
