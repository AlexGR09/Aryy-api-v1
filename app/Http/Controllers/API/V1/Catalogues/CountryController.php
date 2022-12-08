<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\CountryRequest;
use App\Http\Resources\API\V1\Catalogues\CountryResource;
use App\Models\Country;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show countries')->only([
            'index',
            'show',
        ]);
        $this->middleware('permission:create countries')->only([
            'store',
        ]);
        $this->middleware('permission:edit countries')->only([
            'update',
        ]);
        $this->middleware('permission:delete countries')->only([
            'destroy',
        ]);
    }

    public function index()
    {
        try {
            $countries = Country::paginate(5);
            return (CountryResource::collection($countries))->additional(['message' => 'Países encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Country $country)
    {
        try {
            return (new CountryResource($country))->additional(['message' => 'País encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(CountryRequest $request)
    {
        try {
            $country = Country::create(['name' => $request->name]);
            return (new CountryResource($country))->additional(['message' => 'País creado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(CountryRequest $request, Country $country)
    {
        try {
            $country->name = $request->name;
            $country->save();
            return (new CountryResource($country))->additional(['message' => 'País actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Country $country)
    {
        try {
            $country->delete();
            return (new CountryResource($country))->additional(['message' => 'País eliminado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
