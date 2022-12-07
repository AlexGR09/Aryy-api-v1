<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Patient\IdentityResource;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdentityController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Patient')->only([
            'index',
            'update',
            'store',
            'show',
        ]);
    }
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            // GUARDA LA FOTO DE LA CÉDULA DE LA ESPECIALIDAD EN LA CARPETA CORRESPONDIENTE DEL USUARIO
            $file = $request->file('id_card');
            $fileName = $file->getClientOriginalName();
            $file->storeAs($this->user->user_folder . '//identity//', $fileName);
            $patient = Patient::where('user_id', $this->user->id)->firstOrFail();
            $patient->id_card = '//identity//' . $fileName;
            $patient->save();

            return (new IdentityResource($patient))->additional(['message' => 'Imagen guardada con exito.']);
        } catch (\Throwable $th) {
            Storage::delete($this->user->user_folder.'//identity//' . $fileName);
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
           $patient = Patient::where('user_id', $this->user->id)->first();
           $path = $this->user->user_folder.$patient->id_card;
           
            $image = Storage::get($path);
            return response($image, 200)->header('Content-Type', Storage::mimeType($path));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
