<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\RespiratoryPathologyResource;
use App\Models\RespiratoryPathology;

class RespiratoryPathologyController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:show respiratory pathologies|User')->only([
            'index',
            'show',
        ]);
    }

    public function index()
    {
        try {
            return RespiratoryPathologyResource::collection(RespiratoryPathology::orderBy('name')->get())
                ->additional(['message' => 'Patologías respiratorias encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(RespiratoryPathology $respiratory_pathology)
    {
        try {
            return (new RespiratoryPathologyResource($respiratory_pathology))
                ->additional(['message' => 'Patología respiratoria encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
