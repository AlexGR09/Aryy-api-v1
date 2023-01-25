<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\FavoriteRequest;
use App\Http\Resources\API\V1\Patient\FavoriteResource;
use App\Models\Favorite;
use App\Models\Patient;
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

    public function store(Request $request,$physician_id)
    {
        try {
            $favorite = Favorite::create([
                'patient_id'=>$this->patient->id,
                'physician_id'=>$physician_id,
            ]);
            return response()->json(["Medico agregado a favoritos"]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        $favorite = Favorite::where('patient_id', $this->patient->id)->get();
        if (is_null($favorite)) { 
            return response()->json(['msg' =>'No tienes medicos favoritos agregados']);
        }
        return(FavoriteResource::collection($favorite));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
