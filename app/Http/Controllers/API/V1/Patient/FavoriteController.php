<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\Favorite2Resource;
use App\Http\Resources\API\V1\Patient\FavoriteResource;
use App\Http\Resources\API\V1\Patient\InfoPhysicianResource;
use App\Models\Favorite;
use App\Models\Patient;
use App\Models\Physician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Patient')->only([
            'store',
            'show',
            'destroy',
            'physicianInfo',
            'favoritephysician',
        ]);
    }

    /* public function store($patient_id, $physician_id)
    {
        try {
            DB::beginTransaction();

            $patient = $this->patient($patient_id);
            if (!$patient) {
                return response()->json(['message' => '¡¡No puedes acceder a este perfil!!']);
            }
            $physician = Physician::where('id', $physician_id)->first();
            if (empty($physician)) {
                return response()->json(['message' => 'El medico que quieres agregar no existe']);
            }
            //Se verifica que el medico agregado como favorito no este repetido
            $favorite = Favorite::where([['patient_id', $patient_id], ['physician_id', $physician_id]])->count();
            if ($favorite >= 1) {
                return response()->json(['message' => 'Ya has agregado a este medico com favorito']);
            }
            Favorite::create([
                'patient_id' => $patient,
                'physician_id' => $physician->id,
            ]);
            DB::commit();
            return response()->json(["Medico agregado a favoritos"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    } */

    public function show($patient_id)
    {
        $patient = $this->patient($patient_id);
        if (!$patient) {
            return response()->json(['message' => '¡¡No puedes acceder a este perfil!!']);
        }
        $favorite = Favorite::where('patient_id', $patient)->get();
        if (count($favorite) > 0) {
            return FavoriteResource::collection($favorite);
        }

        return response()->json(['message' => 'Aun no tiene favoritos']);
    }

    /* public function destroy($patient_id, $physician_id)
    {
        $patient = $this->patient($patient_id);
        if (!$patient) {
            return response()->json(['message' => '¡¡No puedes acceder a este perfil!!']);
        }
        $favoritePhysician = Favorite::where([['physician_id', $physician_id], ['patient_id', $patient]])->first();
        if (empty($favoritePhysician)) {
            return response()->json(['message' => 'Aun no tiene favoritos']);
        }
        $favoritePhysician->delete();
        return response()->json(['message' => 'Especialista eliminado']);
    } */

    public function physicianInfo($patient_id, $physician_id)
    {
        $patient = $this->patient($patient_id);
        if (!$patient) {
            return response()->json(['message' => '¡¡No puedes acceder a este perfil!!']);
        }
        $favoritePhysician = Favorite::where([['physician_id', $physician_id], ['patient_id', $patient]])->first();
        if ($favoritePhysician) {
            $physician = Physician::where('id', $favoritePhysician->physician_id)->firstOrFail();

            return new InfoPhysicianResource($physician);
        }

        return response()->json(['message' => 'No se encontro la informacion del medico']);
    }

    public function patient($patient_id)
    {
        //Se verifica que el perfil de paciente este relacionada con el perfil del usuario logeado
        $patient = Patient::where([['id', $patient_id], ['user_id', auth()->id()]])->first();
        if (!$patient) {
            return $patient;
        }

        return $patient->id;
    }

    public function favoritephysician($patient_id, $physician_id)
    {
        try {
            $patient = $this->patient($patient_id);
            if (!$patient) {
                return response()->json(['message' => '¡¡No puedes acceder a este perfil!!']);
            }
            $favoritePhysician = Favorite::where([['physician_id', $physician_id], ['patient_id', $patient]])->first();
            if ($favoritePhysician) {
                $favoritePhysician->delete();
            }
            $favorite = Favorite::create([
                'patient_id' => $patient,
                'physician_id' => $physician_id,
                'is_favorite' => 1,
            ]);

            return (new Favorite2Resource($favorite));
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
