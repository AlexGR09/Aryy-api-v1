<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\CityRequest;
use App\Http\Resources\API\V1\Catalogues\CityResource;
use App\Models\City;

class CityController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('permission:show cities', [
            'index',
            'show',
        ]);
        $this->middleware('permission:create cities', [
            'store',
        ]);
        $this->middleware('permission:edit cities', [
            'update',
        ]);
        $this->middleware('permission:delete cities', [
            'destroy',
        ]);
    }

    public function index()
    {
        try {
            $cities = City::paginate(5);
            return (CityResource::collection($cities))->additional(['message' => 'Ciudades encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(City $city)
    {
        try {
            return (new CityResource($city))->additional(['message' => 'Ciudad encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(CityRequest $request)
    {
        try {
            $city = City::create(['name' => $request->name, 'state_id' => $request->state_id]);
            return (new CityResource($city))->additional(['message' => 'Ciudad creada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(CityRequest $request, City $city)
    {
        try {
            $city->name = $request->name;
            $city->state_id = $request->state_id;
            $city->save();
            return (new CityResource($city))->additional(['message' => 'Ciudad actualizada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(City $city)
    {
        try {
            $city->delete();
            return (new CityResource($city))->additional(['message' => 'Ciudad eliminada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
