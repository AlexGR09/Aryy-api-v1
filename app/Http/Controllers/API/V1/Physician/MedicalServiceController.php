<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\MedicalServiceUpdateRequest;
use App\Http\Resources\API\V1\Physician\PhysicianResource;
use App\Models\Physician;
// use Illuminate\Http\Request;

class MedicalServiceController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Physician');
    }

    public function update(MedicalServiceUpdateRequest $request)
    {
        try {
            $physician = Physician::where('user_id', $this->user->id)->firstOrFail();
            $physician->first_time_consultation = $request->first_time_consultation;
            $physician->subsequent_consultation = $request->subsequent_consultation;
            $physician->languages = $request->languages;
            $physician->save();

            // MEDICAL SERVICES


            return $physician->medical_services;

            return (new PhysicianResource($physician))->additional(['message' => 'Perfil médico actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
