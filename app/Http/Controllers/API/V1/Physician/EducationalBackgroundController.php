<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\UploadCertificateRequest;
use App\Http\Requests\API\V1\Physician\UploadLicenseRequest;
use App\Models\Physician;
use App\Models\PhysicianSpecialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationalBackgroundController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Physician')->only([
            'uploadEducationalBackground',
            'uploadCertificates',
        ]);
    }

    public function uploadLicense(UploadLicenseRequest $request)
    {
        $fileName = null;
        try {
            // GUARDA LA FOTO DE LA CÉDULA DE LA ESPECIALIDAD EN LA CARPETA CORRESPONDIENTE DEL USUARIO
            $file = $request->file('license_photo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->storeAs($this->user->user_folder.'//licenses//', $fileName);

            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();
            $specialtyOfPhysician = PhysicianSpecialty::where('license', $request->license)
                ->where('physician_id', $physician->id)
                ->firstOrFail();

            // ELIMINA LA FOTO PREVIA DE LA CÉDULA DE LA ESPECIALIDAD
            Storage::delete($this->user->user_folder.$specialtyOfPhysician->license_photo);

            // SE GUARDA LA REFERENCIA DEL ARCHIVO SUBIDO AL SERVIDOR EN LA TABLA PHYSICIAN_SPECIALTY
            $specialtyOfPhysician->license_photo = '//licenses//'.$fileName;
            $specialtyOfPhysician->save();

            return response()->json(['message' => 'imagen de cédula guardada correctamente']);
        } catch (\Throwable $th) {
            Storage::delete($this->user->user_folder.'//licenses//'.$fileName);

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function uploadCertificate(UploadCertificateRequest $request)
    {
        try {
            // RECORRIDO DE CERTIFICADO(S) DE LA SOLICITUD
            $certificates = [];
            $certificateFileName = [];

            foreach ($request->file('certificate_photo') as $key => $file) {
                // GUARDA LAS FOTOS DE LOS CERTIFICADOS EN LA CARPETA CORRESPONDIENTE DEL USUARIO
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs($this->user->user_folder.'//certificates//', $fileName);

                // ESTE ARRAY CONTIENE EL FORMATO PARA LA BD DE LAS FOTOS DE LOS CERTIFICADOS
                $certificates += [
                    $key => [
                        'certificate_photo' => '//certificates//'.$fileName,
                    ],
                ];

                // ESTE ARRAY CONTIENE LA RUTA ABSOLUTA DE LAS FOTOS DE LOS CERTIFICADOS
                $certificateFileName[] = $this->user->user_folder.'//certificates//'.$fileName;
            }

            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();

            // COMBINA LOS ELEMENTOS DEL ARRAY DE CERTIFICADOS CUANDO EL CAMPO CERTIFICADOS EN LA BD NO ES NULO
            $currentCertificates = $certificates;
            if ($physician->certificates != null) {
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

    public function deleteCertificate(Request $request)
    {
        try {
            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();

            return $physician->certificates;

            // unset($certificates['dos']);

            $currentCertificates = [];
            foreach ($certificates as $key => $certificate) {
                if ($certificate['certificate_photo'] == $request->certificate_filename) {
                    return 'lo encontré en'.$key;
                }

                // $currentSpecialties += [ $key => $specialty];
            }

            return $currentCertificates;

            // return $certificates;

            // Storage::delete($this->user->user_folder.'//certificates//'.$request->certificate_filename);

            return response()->json(['message' => 'imagen de certificado eliminada correctamente']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
