<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\SubSpecialtyResource;
use App\Models\SubSpecialty;
use Illuminate\Http\Request;

class SubSpecialtyController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        try {
            if ($this->user->hasRole('User')) {
                return SubSpecialtyResource::collection(SubSpecialty::orderBy('name')->get());
            }

            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function subSpecialtiesOfSpecialty(Request $request)
    {
        try {
            if ($this->user->hasRole('User')) {
                return SubSpecialtyResource::collection(SubSpecialty::orderBy('name')->where('specialty_id', $request->specialty_id)->get());
            }

            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
