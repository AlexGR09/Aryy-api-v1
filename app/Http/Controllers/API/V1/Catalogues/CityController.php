<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\CityRequest;
use App\Http\Resources\API\V1\Catalogues\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('role_or_permission:User|show cities')->only(
            [
                'index',
                'show',
            ]
        );
        $this->middleware('role_or_permission:User')->only(
            [
                'citiesOfState',
            ]
        );
        $this->middleware('permission:create cities')->only([
            'store',
        ]);
        $this->middleware('permission:edit cities')->only([
            'update',
        ]);
        $this->middleware('permission:delete cities')->only(
            [
                'destroy',
            ]
        );
    }

    public function index()
    {
        try {
            return CityResource::collection(City::orderBy('name')->get());
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function citiesOfState(Request $request)
    {
        try {
            return CityResource::collection(City::orderBy('name')->where('state_id', $request->state_id)->get());
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
