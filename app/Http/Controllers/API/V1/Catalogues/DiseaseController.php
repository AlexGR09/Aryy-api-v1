<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\DiseaseRequest;
use App\Http\Resources\API\V1\Catalogues\DiseaseResource;
use App\Models\Disease;

class DiseaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show diseases')->only([
            'index',
            'show',
        ]);
        $this->middleware('permission:create diseases')->only([
            'store',
        ]);
        $this->middleware('permission:edit diseases')->only([
            'update',
        ]);
        $this->middleware('permission:delete diseases')->only([
            'destroy',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $diseases = Disease::paginate(5);

            return DiseaseResource::collection($diseases)->additional(['message' => 'Enfermedades existentes']);
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
    public function store(DiseaseRequest $request)
    {
        try {
            $disease = Disease::create(['name' => $request->name]);

            return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad creada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }

        /* $disease = Disease::create([
            'name' => $request->name,
        ]);
        return new DiseaseResource($disease); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        try {
            return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad encontrada']);
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
    public function update(DiseaseRequest $request, Disease $disease)
    {
        try {
            $disease->name = $request->name;
            $disease->country_id = $request->country_id;
            $disease->save();

            return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad actualizada con éxito.']);
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
    public function destroy(Disease $disease)
    {
        try {
            $disease->delete();

            return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad eliminada exitosamente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
