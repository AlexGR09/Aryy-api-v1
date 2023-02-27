<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\AlergyRequest;
use App\Http\Resources\API\V1\Catalogues\AllergyResource;
use App\Models\Allergy;

class AlergyController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:User|show cities')->only(
            [
                'index',
                'show',
            ]
        );
        $this->middleware('permission:create alergies')->only(
            [
                'store',

            ]
        );
        $this->middleware('permission:edit alergies')->only(
            [
                'update',

            ]
        );
        $this->middleware('permission:delete alergies')->only(
            [
                'destroy',

            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $alergies = Allergy::paginate(5);

            return AllergyResource::collection($alergies)->additional(['message' => 'Alergias existentes']);
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
            $state = Allergy::create(['name' => $request->name]);

            return (new AllergyResource($state))->additional(['message' => 'Alergia creada con éxito.']);
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
    public function show(Allergy $alergy)
    {
        try {
            return (new AllergyResource($alergy))->additional(['message' => 'Alergia encontrada.']);
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
    public function update(AlergyRequest $request, Allergy $alergy)
    {
        try {
            $alergy->name = $request->name;
            $alergy->save();

            return (new AllergyResource($alergy))->additional(['message' => 'Alergia actualizada con éxito.']);
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
            $alergy->delete();

            return (new AllergyResource($alergy))->additional(['message' => 'Alergia eliminada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
