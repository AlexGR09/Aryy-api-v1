<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\UploadFacilityPhotoRequest;
use App\Http\Requests\API\V1\Physician\UploadLogoRequest;
use App\Http\Requests\API\V1\Physician\UploadPhysicianPhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicalIdentityController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Physician');
    }

    public function uploadLogo(UploadLogoRequest $request)
    {
        try {
            // VACIA EL DIRECTORIO LOGOS DEL USUARIO CORRESPONDIENTE
            Storage::deleteDirectory($this->user->user_folder.'//logos//');

            // GUARDA LA IMAGEN DEL LOGO EN LA CARPETA CORRESPONDIENTE DEL USUARIO
            $file = $request->file('logo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->storeAs($this->user->user_folder.'//logos//', $fileName);

            return response()->json(['message' => 'Imagen de cédula almacenada correctamente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function uploadPhysicianPhoto(UploadPhysicianPhotoRequest $request)
    {
        try {
            foreach ($request->file('physician_photo') as $key => $file) {
                // GUARDA LAS FOTOS DEL MÉDICO EN LA CARPETA CORRESPONDIENTE DEL USUARIO
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs($this->user->user_folder.'//physician_photos//', $fileName);
    
            }
            return response()->json(['message' => 'Imagen del médico almacenada correctamente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function uploadFacilityPhoto(UploadFacilityPhotoRequest $request)
    {
        try {
            foreach ($request->file('facility_photo') as $key => $file) {
                // GUARDA LAS FOTOS DEL MÉDICO EN LA CARPETA CORRESPONDIENTE DEL USUARIO
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs($this->user->user_folder.'//facility_photos//', $fileName);
    
            }
            return response()->json(['message' => 'Imagen de la instalación almacenada correctamente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function deleteImage(Request $request)
    {
        try {
            Storage::delete($this->user->user_folder.$request->photo_path);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function getImage(Request $request)
    {
        try {

            $path = $request->photo_path;
            // $path = $this->user->user_folder.$request->photo_path;

            // return $path;

            // $image = Storage::files($path);
            $image = Storage::get($path);

            return response($image, 200)->header('Content-Type', Storage::mimeType($path));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function index()
    {
        try {
            // LOGO DE LA IDENTIDAD MÉDICA
            $logo = Storage::files($this->user->user_folder.'//logos//');

            // FOTOS DEL MÉDICO
            $physician_photos = Storage::files($this->user->user_folder.'//physician_photos//');

            // FOTOS DE LA INSTALACIÓN
            $facility_photos = Storage::files($this->user->user_folder.'//facility_photos//');

            $data = array(
                'logo' => $logo,
                'physician_photos' => $physician_photos,
                'facility_photos' => $facility_photos
            );

            return response()->json([
                'message' => 'Imágenes de identidad médica',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
