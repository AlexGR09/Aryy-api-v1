<?php

namespace App\Http\Controllers\Catalogues;

use App\Http\Controllers\Controller;

class CityController extends Controller
{

    protected $user;

    public function __construct() {
        $this->user = auth()->user();
    }

    public function index() {
        try {
            if ($this->user->hasPermissionTo('show states')) {
                $states = State::paginate(5);
                return (StateResource::collection($states))->additional(['message' => 'Estados encontrados.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(State $state) {
        try {
            if ($this->user->hasPermissionTo('show states')) {
                return (new StateResource($state))->additional(['message' => 'Estado encontrado.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(StateRequest $request) {
        try {
            if ($this->user->hasPermissionTo('create states')) {
                $state = State::create(['name' => $request->name, 'country_id' => $request->country_id]);
                return (new StateResource($state))->additional(['message' => 'Estado creado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(StateRequest $request, State $state) {
        try {
            if ($this->user->hasPermissionTo('edit states')) {
                $state->name = $request->name;
                $state->country_id = $request->country_id;
                $state->save();
                return (new StateResource($state))->additional(['message' => 'Estado actualizado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(State $state) {
        try {
            if ($this->user->hasPermissionTo('delete states')) {
                $state->delete();
                return (new StateResource($state))->additional(['message' => 'Estado eliminado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

}