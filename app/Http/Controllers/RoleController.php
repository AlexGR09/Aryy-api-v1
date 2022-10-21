<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    
    protected $user;

    public function __construct() {
        $this->user = auth()->user();
    }

    public function index() {
        try {
            if ($this->user->hasPermissionTo('show roles')) {
                $roles = Role::with('permissions')->paginate(5);
                return (RoleResource::collection($roles))->additional(['Message' => 'Roles found.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {  
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function show(Role $role) {
        try {
            if ($this->user->hasPermissionTo('show roles')) {
                return (new RoleResource($role))->additional(['Message' => 'Role found']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function store(RoleRequest $request) {
        try {
            if ($this->user->hasPermissionTo('create roles')) {
                DB::beginTransaction();
                $role = Role::create(['name' => $request->name]);
                if ($request->permissions) {
                    $role->givePermissionTo($request->permissions);
                }
                DB::commit();
                return (new RoleResource($role))->additional(['Message' => 'Role created successfully.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function update(RoleRequest $request, Role $role) {
        try {
            if ($this->user->hasPermissionTo('edit roles')) {
                DB::beginTransaction();
                $role->name = $request->name;
                $role->save();
                if ($request->permissions) {
                    $role->syncPermissions($request->permissions);
                }
                DB::commit();
                return (new RoleResource($role))->additional(['Message' => 'Role updated successfully.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Role $role) {
        try {
            if ($this->user->hasPermissionTo('delete roles')) {
                $role->delete();
                return (new RoleResource($role))->additional(['Message' => 'Role deleted successfully.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

}