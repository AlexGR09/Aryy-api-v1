<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\KidneyStoneResource;
use App\Models\KidneyStone;

class KidneyStoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:show kidney stones|User')->only([
            'index',
            'show',
        ]);
    }

    public function index()
    {
        try {
            return KidneyStoneResource::collection(KidneyStone::orderBy('name')->get())
                ->additional(['message' => 'Cálculos renales encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(KidneyStone $kidney_stone)
    {
        try {
            return (new KidneyStoneResource($kidney_stone))
                ->additional(['message' => 'Cálculo renal encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
