<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\FavoriteRequest;
use App\Http\Resources\API\V1\Patient\FavoriteResource;
use App\Http\Resources\API\V1\Physician\PhysicianResource;
use App\Models\Favorite;
use App\Models\Patient;
use App\Models\Physician;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    protected $patient;

    public function __construct()
    {
        $this->middleware('role:Patient')->only([
            'store',
            'show',
            'destroy',
            'physicianInfo'
        ]);
        $this->patient = empty(auth()->id()) ? null : Patient::where('user_id', auth()->id())->firstOrFail();
    }
    public function index()
    {
        //
    }

    public function store($physician_id)
    {
        try {
            $physician = Physician::where('id', $physician_id)->first();
            if (empty($physician)) {
                return response()->json(['message' => 'El medico que quieres agregar no existe']);
            }
            $favorite = Favorite::create([
                'patient_id' => $this->patient->id,
                'physician_id' => $physician->id,
            ]);
            return response()->json(["Medico agregado a favoritos"]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        /* $patient = Patient::where('id', $patient_id)
                ->where('user_id', auth()->id())
                ->firstOrFail(); */
        $favorite = Favorite::where('patient_id', $this->patient->id)->get();
        if (count($favorite) > 0) {
            return (FavoriteResource::collection($favorite));
        }
        return response()->json(['message' => 'Aun no tiene favoritos']);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($physician_id)
    {
        $favoritePhysician = Favorite::where('physician_id', $physician_id)
            ->where('patient_id', $this->patient->id)->first();

        if (empty($favoritePhysician)) {
            response()->json(['message' => 'Aun no tiene
            favoritos']);
        }
        $favoritePhysician->delete();
        return response()->json(['message' => 'Especialista eliminado']);
    }

    public function physicianInfo($physician_id)
    {
        $favoritePhysician = Favorite::where('physician_id', $physician_id)
            ->where('patient_id', $this->patient->id)->first();
        if ($favoritePhysician) {
            $physician = Physician::where('id', $favoritePhysician->physician_id)->firstOrFail();
            return (new PhysicianResource($physician));
        }
        return response()->json(['message' => 'No se encontro la informacion del medico']);
    }
}
