<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Catalogues\StateRequest;
use App\Http\Resources\API\V1\Catalogues\StateResource;
use App\Models\State;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:show states|User')->only([
            'index',
            'show',
        ]);
        $this->middleware('permission:create states')->only([
            'store',
        ]);
        $this->middleware('permission:edit states')->only([
            'update',
        ]);
        $this->middleware('permission:delete states')->only([
            'destroy',
        ]);
    }

    public function index()
    {
        try {
            return StateResource::collection(State::orderBy('name')->get());
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(State $state)
    {
        try {
            return (new StateResource($state))->additional(['message' => 'Estado encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(StateRequest $request)
    {
        try {
            $state = State::create([
                'name' => $request->name,
                'country_id' => $request->country_id,
            ]);

            return (new StateResource($state))->additional(['message' => 'Estado creado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(StateRequest $request, State $state)
    {
        try {
            $state->name = $request->name;
            $state->country_id = $request->country_id;
            $state->save();

            return (new StateResource($state))->additional(['message' => 'Estado actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(State $state)
    {
        try {
            $state->delete();

            return (new StateResource($state))->additional(['message' => 'Estado eliminado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
