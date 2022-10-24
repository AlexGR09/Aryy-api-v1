<?php

namespace App\Http\Controllers\Catalogues;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    protected $user;

    public function __construct() {
        $this->user = auth()->user();
    }

    public function index() {
        try {
            if ($this->user->hasPermissionTo('show countries')) {

                return "hola";
                // $permissions = Permission::paginate(5);
                // return (PermissionResource::collection($permissions))->additional(['message' => 'Permisos encontrados.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
