<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\ThyroidDiseaseResource;
use App\Models\ThyroidDisease;

class ThyroidDiseaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:show thyroid diseases|User')->only([
            'index',
            'show',
        ]);
    }

    public function index()
    {
        try {
            return ThyroidDiseaseResource::collection(ThyroidDisease::orderBy('name')->get())
                ->additional(['message' => 'Enfermedades tiroideas encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(ThyroidDisease $thyroid_disease)
    {
        try {
            return (new ThyroidDiseaseResource($thyroid_disease))
                ->additional(['message' => 'Enfermedades tiroideas encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
