<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PhotoNameRequest;
use App\Http\Requests\API\V1\Patient\ProfilePhotoRequest;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = User::find(auth()->id());
        $this->middleware('role:Patient');
    }

    public function uploadProfilePhoto(ProfilePhotoRequest $request, $id)
    {
        try {
            $patient = Patient::where('id', $id)->where('user_id', $this->user->id)->firstOrFail();

            $directory_patient = $this->user->user_folder . $patient->patient_folder;

            // SE MUEVE LA IMAGEN PREVIA REGISTRADA A LA PAPELERA
            if ($patient->patient_profile_photo != NULL) {
                $from = $directory_patient . '//profile_photo//' . $patient->patient_profile_photo;
                $to = $this->user->user_folder . '//recycle_bin//' . $patient->patient_profile_photo;
                Storage::move($from, $to);
            }

            // SE GUARDA LA IMAGEN EN EL STORAGE ASIMISMO SU REFERENCIA EN LA DB    
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs($directory_patient . '//profile_photo//', $fileName);

            $patient->patient_profile_photo =  $fileName;
            $patient->save();

            return response()->json(['message' => 'Foto de perfil almacenada correctamente.']);
        } catch (\Throwable $th) {
            // SE INVIRTE EL ORIGEN Y DESTINO PARA REVERTIR LOS CAMBIOS
            Storage::move($to, $from);
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function getProfilePhoto(PhotoNameRequest $request, $id) 
    {
        try {
            $patient = Patient::where('id', $id)->where('user_id', $this->user->id)->firstOrFail();

            $path =  $this->user->user_folder . $patient->patient_folder . '//profile_photo//' . $request->photo;
            $image = Storage::get($path);

            if ($image) {
                return response($image, 200)->header('Content-Type', Storage::mimeType($path));
            }

            return response()->json(['message' => 'Foto de perfil no existe.'], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

}
