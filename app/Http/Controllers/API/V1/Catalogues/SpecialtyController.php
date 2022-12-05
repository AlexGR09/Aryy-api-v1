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
    public function __construct()
    {
        $this->middleware('role_or_permission:User|show specialties')->only([
            'index',
            'show',
        ]);
        $this->middleware('permission:create specialties')->only([
            'store'
        ]);
        $this->middleware('permission:edit specialties')->only([
            'update'
        ]);
        $this->middleware('permission:delete specialties')->only([
            'destroy'
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
            return (SpecialtyResource::collection(Specialty::orderBy('name')->get()))->additional(['message' => 'Especialidades encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }


    public function store(SpecialtyRequest $request)
    {
        try {
            $state = Specialty::create(['name' => $request->name]);
            return (new SpecialtyResource($state))->additional(['message' => 'Especialidad creada con éxito.']);
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
            return (new SpecialtyResource($specialty))->additional(['message' => 'Especialidad encontrada.']);
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
            $specialty->name = $request->name;
            $specialty->save();
            return (new SpecialtyResource($specialty))->additional(['message' => 'Especialidad actualizada exitosamente.']);
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
    public function destroy(Specialty $specialty)
    {
        try {
            $specialty->delete();
            return (new SpecialtyResource($specialty))->additional(['message' => 'La especialidad se eliminó de forma exitosa']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
