<?php

namespace App\Http\Controllers\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogues\AlergyRequest;
use App\Http\Resources\Catalogue\AlergyResource as CatalogueAlergyResource;
use App\Http\Resources\Catalogues\AlergyResource;
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
