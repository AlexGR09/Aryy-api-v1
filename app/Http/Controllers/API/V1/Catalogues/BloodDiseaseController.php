<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\BloodDiseaseResource;
use App\Models\BloodDisease;

class BloodDiseaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:show blood diseases|User')->only([
            'index',
            'show',
        ]);
    }

    public function index()
    {
        try {
            return BloodDiseaseResource::collection(BloodDisease::orderBy('name')->get())
                ->additional(['message' => 'Enfermedades de la sangre encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(BloodDisease $blood_disease)
    {
        try {
            return (new BloodDiseaseResource($blood_disease))
                ->additional(['message' => 'Enfermedad de la sangre encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
