<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\SpecialtyRequest;
use App\Http\Resources\API\V1\Catalogues\SpecialtyResource;
use App\Models\Disease;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show specialties')) {
                $specialties = Specialty::paginate(5);
                return (SpecialtyResource::collection($specialties))->additional(['message' => 'Estados encontrados.']);
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
    public function store(SpecialtyRequest $request)
    {
        try {
            if ($this->user->hasPermissionTo('create specialties')) {
                $state = Specialty::create(['name' => $request->name]);
                return (new SpecialtyResource($state))->additional(['message' => 'Especialidad creada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
        /* $specialty = Specialty::create([
            'name' => $request->name,
        ]);
        return new SpecialtyResource($specialty); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        try {
            if ($this->user->hasPermissionTo('show specialties')) {
                return (new SpecialtyResource($specialty))->additional(['message' => 'Especialidad encontrada.']);
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
    public function update(SpecialtyRequest $request, Specialty $specialty)
    {
        try {
            if ($this->user->hasPermissionTo('edit specialties')) {
                $specialty->name = $request->name;
                $specialty->save();
                return (new SpecialtyResource($specialty))->additional(['message' => 'Especialidad actualizada exitosamente.']);
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
    public function destroy(Specialty$specialty)
    {
        try {
            if ($this->user->hasPermissionTo('delete specialties')) {
                $specialty->delete();
                return (new SpecialtyResource($specialty))->additional(['message' => 'La especialidad se eliminó de forma exitosa']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
