<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\EducationalBackgroundRequest;
use App\Models\Physician;
use App\Models\PhysicianSpecialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Physician')->only(['educationalBackground']);
    }

    public function uploadEducationalBackground(EducationalBackgroundRequest $request)
    {
        try {
            // GUARDA LA FOTO DE LA CÉDULA DE LA ESPECIALIDAD EN LA CARPETA CORRESPONDIENTE DEL USUARIO
            $file = $request->file('license_photo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->storeAs($this->user->user_folder.'//licenses//', $fileName);

            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();
            $specialtyOfPhysician = PhysicianSpecialty::where('license', $request->license)
                ->where('physician_id', $physician->id)
                ->firstOrFail();
            // SE GUARDA LA REFERENCIA DEL ARCHIVO SUBIDO AL SERVIDOR EN LA TABLA PHYSICIAN_SPECIALTY
            $specialtyOfPhysician->license_photo = '//licenses//'.$fileName;
            $specialtyOfPhysician->save();

            return response()->json(['message' => 'imagen de cédula guardada correctamente']);
        } catch (\Throwable $th) {
            Storage::delete($this->user->user_folder.'//licenses//'.$fileName);
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function uploadCertificates(Request $request)
    {
        try {
            $certificates = [];
            $certificateFileName = array();
            // RECORRIDO DE CERTIFICADO(S) DE LA SOLICITUD
            foreach ($request->file('certificate_photo') as $key => $file) {
                // GUARDA LAS FOTOS DE LOS CERTIFICADOS EN LA CARPETA CORRESPONDIENTE DEL USUARIO
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs($this->user->user_folder.'//certificates//', $fileName);
                // ESTE ARRAY CONTIENE EL FORMATO PARA LA BD DE LAS FOTOS DE LOS CERTIFICADOS
                $certificates += [ 
                    $key => [
                        'certificate_photo' => '//certificates//'.$fileName
                    ] 
                ];
                // ESTE ARRAY CONTIENE LA RUTA ABSOLUTA DE LAS FOTOS DE LOS CERTIFICADOS
                $certificateFileName[] = $this->user->user_folder.'//certificates//'.$fileName;
            }

            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();

            // COMBINA LOS ELEMENTOS DEL ARRAY DE CERTIFICADOS CUANDO EL CAMPO CERTIFICADOS EN LA BD NO ES NULO
            $currentCertificates = $certificates;   
            if ($physician->certificates != NULL) {
                $currentCertificates = array_merge($physician->certificates, $certificates);
            }

             // SE GUARDA LA REFERENCIA DE LOS CERTIFICADOS DEL SERVIDOR EN LA TABLA PHYSICIAN
            $physician->certificates = $currentCertificates;
            $physician->save();

            return response()->json(['message' => 'imagen de certificado guardada correctamente']);
        } catch (\Throwable $th) {
            Storage::delete($certificateFileName);
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
