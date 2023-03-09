<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\HepatitisResource;
use App\Models\Hepatitis;

class HepatitisController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:show hepatitis|User')->only([
            'index',
            'show',
        ]);
    }

    public function index()
    {
        try {
            return HepatitisResource::collection(Hepatitis::orderBy('name')->get())
                ->additional(['message' => 'Hepatitis encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Hepatitis $hepatiti)
    {
        try {
            return (new HepatitisResource($hepatiti))
                ->additional(['message' => 'Hepatitis encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
