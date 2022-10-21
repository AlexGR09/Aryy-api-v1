<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    protected $user;

    public function __construct() {
        $this->user = auth()->user();
    }

    public function index() {
        try {
            if ($this->user->hasPermissionTo('show permissions')) {
                $permissions = Permission::paginate(5);
                return (PermissionResource::collection($permissions))->additional(['Message' => 'Permissions found.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function show(Permission $permission) {
        try {
            if ($this->user->hasPermissionTo('show permissions')) {
                return (new PermissionResource($permission))->additional(['Message' => 'Permission found']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function store(PermissionRequest $request) {
        try {
            if ($this->user->hasPermissionTo('create permissions')) {
                $permission = Permission::create(['name' => $request->name]);
                return (new PermissionResource($permission))->additional(['Message' => 'Permission created successfully.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function update(PermissionRequest $request, Permission $permission) {
        try {
            if ($this->user->hasPermissionTo('edit permissions')) {
                $permission->name = $request->name;
                $permission->save();
                return (new PermissionResource($permission))->additional(['Message' => 'Permission updated successfully.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Permission $permission) {
        try {
            if ($this->user->hasPermissionTo('delete permissions')) {
                $permission->delete();
                return (new PermissionResource($permission))->additional(['Message' => 'Permission deleted successfully.']);
            }
            return response()->json(['Message' => 'You do not have permission for this action.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th->getMessage()], 503);
        }
    }

}