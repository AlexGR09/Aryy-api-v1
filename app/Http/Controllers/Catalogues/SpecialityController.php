<?php

namespace App\Http\Controllers\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogues\SpecialityRequest;
use App\Http\Resources\Catalogues\SpecialityResource;
use App\Models\Disease;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show specialities')) {
                $specialities = Speciality::paginate(5);
                return (SpecialityResource::collection($specialities))->additional(['message' => 'Estados encontrados.']);
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
    public function store(SpecialityRequest $request)
    {
        try {
            if ($this->user->hasPermissionTo('create specialities')) {
                $state = Speciality::create(['name' => $request->name]);
                return (new SpecialityResource($state))->additional(['message' => 'Especialidad creada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
        /* $speciality = Speciality::create([
            'name' => $request->name,
        ]);
        return new SpecialityResource($speciality); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        try {
            if ($this->user->hasPermissionTo('show specialities')) {
                return (new SpecialityResource($speciality))->additional(['message' => 'Especialidad encontrada.']);
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
    public function update(SpecialityRequest $request, Speciality $speciality)
    {
        try {
            if ($this->user->hasPermissionTo('edit specialities')) {
                $speciality->name = $request->name;
                $speciality->save();
                return (new SpecialityResource($speciality))->additional(['message' => 'Especialidad actualizada exitosamente.']);
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
    public function destroy(Speciality$speciality)
    {
        try {
            if ($this->user->hasPermissionTo('delete specialities')) {
                $speciality->delete();
                return (new SpecialityResource($speciality))->additional(['message' => 'La especialidad se eliminó de forma exitosa']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
