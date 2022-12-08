<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\PermissionRequest;
use App\Http\Resources\API\V1\PermissionResource;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('permission:show permissions')->only([
            'index',
            'show'
        ]);
        $this->middleware('permission:create permissions')->only([
            'store'
        ]);
        $this->middleware('permission:edit permissions')->only([
            'update'
        ]);
        $this->middleware('permission:delete permissions')->only([
            'destroy'
        ]);
    }

    public function index()
    {
        try {
            $permissions = Permission::paginate(5);
            return (PermissionResource::collection($permissions))->additional(['message' => 'Permisos encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Permission $permission)
    {
        try {
            return (new PermissionResource($permission))->additional(['message' => 'Permiso encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PermissionRequest $request)
    {
        try {
            $permission = Permission::create(['name' => $request->name]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        try {
            $permission->name = $request->name;
            $permission->save();
            return (new PermissionResource($permission))->additional(['message' => 'Permiso actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();
            return (new PermissionResource($permission))->additional(['message' => 'Permiso eliminado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
