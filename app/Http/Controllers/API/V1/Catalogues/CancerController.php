<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\CancerResource;
use App\Models\Cancer;

class CancerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:show cancers|User')->only([
            'index',
            'show',
        ]);
    }

    public function index()
    {
        try {
            return CancerResource::collection(Cancer::orderBy('name')->get())
                ->additional(['message' => 'Cánceres encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Cancer $cancer)
    {
        try {
            return (new CancerResource($cancer))
                ->additional(['message' => 'Cáncer encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}