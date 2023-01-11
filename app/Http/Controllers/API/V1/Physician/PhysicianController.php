<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PhysicianStoreRequest;
use App\Http\Requests\API\V1\Physician\PhysicianUpdateRequest;
use App\Http\Resources\API\V1\Physician\PhysicianResource;
use App\Models\Physician;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PhysicianController extends Controller
{
    public function show(User $physician)
    {
        try {
            $message = 'Mi perfil médico.';
            $physicianDb = Physician::with(['score', 'facilitiesCoordinates','facilities', 'specialty:name','physician_specialty'])
            ->where('user_id', $physician->id)
            ->withCount('comments')
            ->first();

            if ($physician->hasRole('PhysicianInVerification')) {
                $message = 'Su perfil médico está en proceso de verificación, esto puede tomar un par de días. Por favor, tenga paciencia, nosotros le avisaremos.';
            }
            return (new PhysicianResource($physicianDb))->additional(['message' => $message]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
