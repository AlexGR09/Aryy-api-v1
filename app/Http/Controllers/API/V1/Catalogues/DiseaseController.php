<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\DiseaseRequest;
use App\Http\Resources\API\V1\Catalogues\DiseaseResource;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show diseases')) {
                $diseases = Disease::paginate(5);
                return (DiseaseResource::collection($diseases))->additional(['message' => 'Enfermedades existentes']);
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
    public function store(DiseaseRequest $request)
    {

        try {
            if ($this->user->hasPermissionTo('create diseases')) {
                $disease = Disease::create(['name' => $request->name]);
                return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad creada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
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
            if ($this->user->hasPermissionTo('show diseases')) {
                return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad encontrada']);
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
    public function update(DiseaseRequest $request, Disease $disease)
    {
        try {
            if ($this->user->hasPermissionTo('edit diseases')) {
                $disease->name = $request->name;
                $disease->country_id = $request->country_id;
                $disease->save();
                return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad actualizada con éxito.']);
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
    public function destroy(Disease $disease)
    {
        try {
            if ($this->user->hasPermissionTo('delete states')) {
                $disease->delete();
                return (new DiseaseResource($disease))->additional(['message' => 'Enfermedad eliminada exitosamente.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
