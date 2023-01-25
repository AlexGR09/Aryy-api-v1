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
            'index',
            'store',
            'show'
        ]);
        $this->patient = empty(auth()->id()) ? null : Patient::where('user_id', auth()->id())->firstOrFail();
    }
    public function index()
    {
        return $this->patient;
    }

    public function store(Request $request, $physician_id)
    {
        try {

            $favorite = Favorite::create([
                'patient_id' => $this->patient->id,
                'physician_id' => $physician_id,
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
        if (is_null($favorite)) {
            return response()->json(['message' => 'Aun no tiene favoritos']);
        }
        return (FavoriteResource::collection($favorite));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
