<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\AlergyRequest;
use App\Http\Resources\API\V1\Catalogues\AlergyResource;
use App\Models\Alergy;
use Illuminate\Http\Request;

class AlergyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show alergies')) {
                $alergies = Alergy::paginate(5);
                return (AlergyResource::collection($alergies))->additional(['message' => 'Alergias existentes']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlergyRequest $request)
    {
        try {
            if ($this->user->hasPermissionTo('create alergies')) {
                $state = Alergy::create(['name' => $request->name]);
                return (new AlergyResource($state))->additional(['message' => 'Alergia creada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }

        /* $alergy = Alergy::create([
            'name' => $request->name,
        ]);
        return new AlergyResource($alergy); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Alergy $alergy)
    {
        try {
            if ($this->user->hasPermissionTo('show alergies')) {
                return (new AlergyResource($alergy))->additional(['message' => 'Alergia encontrada.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlergyRequest $request, Alergy $alergy)
    {
        try {
            if ($this->user->hasPermissionTo('edit alergies')) {
                $alergy->name = $request->name;
                $alergy->save();
                return (new AlergyResource($alergy))->additional(['message' => 'Alergia actualizada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alergy $alergy)
    {
        try {
            if ($this->user->hasPermissionTo('delete alergies')) {
                $alergy->delete();
                return (new AlergyResource($alergy))->additional(['message' => 'Alergia eliminada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
