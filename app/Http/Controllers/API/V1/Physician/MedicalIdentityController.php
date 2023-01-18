<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PhotoNameRequest;
use App\Http\Requests\API\V1\Physician\UploadFacilityPhotoRequest;
use App\Http\Requests\API\V1\Physician\UploadLogoRequest;
use App\Http\Requests\API\V1\Physician\UploadPhysicianPhotoRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MedicalIdentityController extends Controller
{
    protected $user;

    protected $path_physicians;

    public function __construct()
    {
        $this->user = empty(auth()->id()) ? null : User::findOrFail(auth()->id());

        $this->path_physicians = '//users//physicians//';
        $this->middleware('role:Physician');
    }

    public function index()
    {
        try {
            // LOGO DE LA IDENTIDAD MÉDICA
            $logo_all = Storage::files($this->path_physicians.$this->user->user_folder.'//logos//');
            $logo = empty($logo_all) ? null : basename($logo_all[0]);

            // FOTOS DEL MÉDICO
            $physician_photos = [];
            $physician_photos_all = Storage::files($this->path_physicians.$this->user->user_folder.'//physician_photos//');
            foreach ($physician_photos_all as $physician_photo) {
                $physician_photo_name = basename($physician_photo);
                array_push($physician_photos, $physician_photo_name);
            }

            // FOTOS DE LA INSTALACIÓN
            $facility_photos = [];
            $facility_photos_all = Storage::files($this->path_physicians.$this->user->user_folder.'//facility_photos//');
            foreach ($facility_photos_all as $facility_photo) {
                $facility_photo_name = basename($facility_photo);
                array_push($facility_photos, $facility_photo_name);
            }

            return response()->json([
                'message' => 'Imágenes de identidad médica',
                'data' => [
                    'logo' => $logo,
                    'physician_photos' => $physician_photos,
                    'facility_photos' => $facility_photos,
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function uploadLogo(UploadLogoRequest $request)
    {
        try {
            // VACIA EL DIRECTORIO LOGOS DEL USUARIO CORRESPONDIENTE
            Storage::deleteDirectory($this->path_physicians.$this->user->user_folder.'//logos//');

            // GUARDA LA IMAGEN DEL LOGO EN LA CARPETA CORRESPONDIENTE DEL USUARIO
            $file = $request->file('logo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->storeAs($this->path_physicians.$this->user->user_folder.'//logos//', $fileName);

            return response()->json(['message' => 'Imagen del logo almacenada correctamente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function getLogo(PhotoNameRequest $request)
    {
        try {
            $path = $this->path_physicians.$this->user->user_folder.'//logos//'.$request->photo;
            $image = Storage::get($path);

            if ($image) {
                return response($image, 200)->header('Content-Type', Storage::mimeType($path));
            }

            return response()->json(['message' => 'El logo no existe.'], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function deleteLogo(PhotoNameRequest $request)
    {
        try {
            $path = $this->path_physicians.$this->user->user_folder.'//logos//'.$request->photo;
            $image = Storage::get($path);

            if ($image) {
                Storage::delete($path);

                return response()->json(['message' => 'Logo eliminado correctamente.']);
            }

            return response()->json(['message' => 'El logo no existe.'], 404);
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
                $file->storeAs($this->path_physicians.$this->user->user_folder.'//physician_photos//', $fileName);
            }

            return response()->json(['message' => 'Foto del médico almacenada correctamente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function getPhysicianPhoto(PhotoNameRequest $request)
    {
        try {
            $path = $this->path_physicians.$this->user->user_folder.'//physician_photos//'.$request->photo;
            $image = Storage::get($path);

            if ($image) {
                return response($image, 200)->header('Content-Type', Storage::mimeType($path));
            }

            return response()->json(['message' => 'La foto del médico no existe.'], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function deletePhysicianPhoto(PhotoNameRequest $request)
    {
        try {
            $path = $this->path_physicians.$this->user->user_folder.'//physician_photos//'.$request->photo;
            $image = Storage::get($path);

            if ($image) {
                Storage::delete($path);

                return response()->json(['message' => 'Foto del médico  eliminada correctamente.']);
            }

            return response()->json(['message' => 'La foto del médico no existe.'], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function uploadFacilityPhoto(UploadFacilityPhotoRequest $request)
    {
        try {
            foreach ($request->file('facility_photo') as $key => $file) {
                // GUARDA LAS FOTOS DE LA INSTALACIÓN EN LA CARPETA CORRESPONDIENTE DEL USUARIO
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs($this->path_physicians.$this->user->user_folder.'//facility_photos//', $fileName);
            }

            return response()->json(['message' => 'Imagen de la instalación almacenada correctamente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function getFacilityPhoto(PhotoNameRequest $request)
    {
        try {
            $path = $this->path_physicians.$this->user->user_folder.'//facility_photos//'.$request->photo;
            $image = Storage::get($path);

            if ($image) {
                return response($image, 200)->header('Content-Type', Storage::mimeType($path));
            }

            return response()->json(['message' => 'La foto de la instalación no existe.'], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function deleteFacilityPhoto(PhotoNameRequest $request)
    {
        try {
            $path = $this->path_physicians.$this->user->user_folder.'//facility_photos//'.$request->photo;
            $image = Storage::get($path);

            if ($image) {
                Storage::delete($path);

                return response()->json(['message' => 'Foto de la instalación eliminada correctamente.']);
            }

            return response()->json(['message' => 'La foto de la instalación no existe.'], 404);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
