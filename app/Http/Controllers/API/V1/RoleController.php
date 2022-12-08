<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\RoleRequest;
use App\Http\Resources\API\V1\RoleResource;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('permission:show roles')->only([
            'index',
            'show'        
        ]);
        $this->middleware('permission:create roles')->only([
            'store',
        ]);
        $this->middleware('permission:edit roles')->only([
            'update'
        ]);
        $this->middleware('permission:delete roles')->only([
            'destroy'
        ]);
    }

    public function index()
    {
        try {
            $roles = Role::with('permissions')->paginate(5);
            return (RoleResource::collection($roles))->additional(['message' => 'Rol encontrado.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Role $role)
    {
        try {
            return (new RoleResource($role))->additional(['message' => 'Roles encontrados']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(RoleRequest $request)
    {
        try {
            DB::beginTransaction();
            $role = Role::create(['name' => $request->name]);
            if ($request->permissions) {
                $role->givePermissionTo($request->permissions);
            }
            DB::commit();
            return (new RoleResource($role))->additional(['message' => 'Rol creado con éxito']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(RoleRequest $request, Role $role)
    {
        try {
            DB::beginTransaction();
            $role->name = $request->name;
            $role->save();
            if ($request->permissions) {
                $role->syncPermissions($request->permissions);
            }
            DB::commit();
            return (new RoleResource($role))->additional(['message' => 'Rol actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return (new RoleResource($role))->additional(['message' => 'Rol eliminado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
