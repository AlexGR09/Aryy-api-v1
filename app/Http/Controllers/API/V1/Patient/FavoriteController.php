<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\API\V1\Patient\FavoriteResource;
use App\Http\Resources\API\V1\Patient\InfoPhysicianResource;
use App\Models\Favorite;
use App\Models\Patient;
use App\Models\Physician;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Patient')->only([
            'store',
            'show',
            'destroy',
            'physicianInfo'
        ]);
    }

    public function store($patient_id, $physician_id)
    {
        try {
            DB::beginTransaction();
            $patient = Patient::where([['id', $patient_id], ['user_id', auth()->id()]])->first();
            $physician = Physician::where('id', $physician_id)->first();
            if (empty($physician)) {
                return response()->json(['message' => 'El medico que quieres agregar no existe']);
            }
            $favorite = Favorite::where([['patient_id',$patient_id],['physician_id',$physician_id]])->count();
            if($favorite>1){
                return response()->json(['message' => 'Ya has agregado a este medico com favorito']);
            }
            Favorite::create([
                'patient_id' => $patient->id,
                'physician_id' => $physician->id,
            ]);
            DB::commit();
            return response()->json(["Medico agregado a favoritos"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($patient_id)
    {
        $patient = Patient::where([['id', $patient_id], ['user_id', auth()->id()]])->firstOrFail();
        $favorite = Favorite::where('patient_id', $patient->id)->get();
        if (count($favorite) > 0) {
            return (FavoriteResource::collection($favorite));
        }
        return response()->json(['message' => 'Aun no tiene favoritos']);
    }

    public function destroy($patient_id, $physician_id)
    {
        $patient = Patient::where([['id', $patient_id], ['user_id', auth()->id()]])->firstOrFail();
        $favoritePhysician = Favorite::where('physician_id', $physician_id)->where('patient_id', $patient->id)->first();
        if (empty($favoritePhysician)) {
            response()->json(['message' => 'Aun no tiene
            favoritos']);
        }
        $favoritePhysician->delete();
        return response()->json(['message' => 'Especialista eliminado']);
    }

    public function physicianInfo($patient_id, $physician_id)
    {
        $patient = Patient::where([['id', $patient_id], ['user_id', auth()->id()]])->first();
        $favoritePhysician = Favorite::where([['physician_id', $physician_id], ['patient_id', $patient->id]])->first();
        if ($favoritePhysician) {
            $physician = Physician::where('id', $favoritePhysician->physician_id)->firstOrFail();
            return (new InfoPhysicianResource($physician));
        }
        return response()->json(['message' => 'No se encontro la informacion del medico']);
    }
}
