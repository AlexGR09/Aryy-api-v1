<?php

namespace App\Http\Controllers\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogues\CountryRequest;
use App\Http\Resources\Catalogues\CountryResource;
use App\Models\Country;

class CountryController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show countries')) {
                $countries = Country::paginate(5);
                return (CountryResource::collection($countries))->additional(['message' => 'Países encontrados.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Country $country)
    {
        try {
            if ($this->user->hasPermissionTo('show countries')) {
                return (new CountryResource($country))->additional(['message' => 'País encontrado.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(CountryRequest $request)
    {
        try {
            if ($this->user->hasPermissionTo('create countries')) {
                $country = Country::create(['name' => $request->name]);
                return (new CountryResource($country))->additional(['message' => 'País creado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(CountryRequest $request, Country $country)
    {
        try {
            if ($this->user->hasPermissionTo('edit countries')) {
                $country->name = $request->name;
                $country->save();
                return (new CountryResource($country))->additional(['message' => 'País actualizado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Country $country)
    {
        try {
            if ($this->user->hasPermissionTo('delete countries')) {
                $country->delete();
                return (new CountryResource($country))->additional(['message' => 'País eliminado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
