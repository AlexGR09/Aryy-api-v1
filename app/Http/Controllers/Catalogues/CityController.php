<?php

namespace App\Http\Controllers\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogues\CityRequest;
use App\Http\Resources\Catalogues\CityResource;
use App\Models\City;

class CityController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show cities')) {
                $cities = City::paginate(5);
                return (CityResource::collection($cities))->additional(['message' => 'Ciudades encontradas.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(City $city)
    {
        try {
            if ($this->user->hasPermissionTo('show cities')) {
                return (new CityResource($city))->additional(['message' => 'Ciudad encontrada.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(CityRequest $request)
    {
        try {
            if ($this->user->hasPermissionTo('create cities')) {
                $city = City::create(['name' => $request->name, 'state_id' => $request->state_id]);
                return (new CityResource($city))->additional(['message' => 'Ciudad creada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(CityRequest $request, City $city)
    {
        try {
            if ($this->user->hasPermissionTo('edit cities')) {
                $city->name = $request->name;
                $city->state_id = $request->state_id;
                $city->save();
                return (new CityResource($city))->additional(['message' => 'Ciudad actualizada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(City $city)
    {
        try {
            if ($this->user->hasPermissionTo('delete cities')) {
                $city->delete();
                return (new CityResource($city))->additional(['message' => 'Ciudad eliminada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
