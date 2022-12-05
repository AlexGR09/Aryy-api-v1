<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            // GUARDA LA FOTO DE LA CÉDULA DE LA ESPECIALIDAD EN LA CARPETA CORRESPONDIENTE DEL USUARIO
            $file = $request->file('license_photo');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->storeAs($this->user->user_folder.'//identity//', $fileName);

            $patient = Patient::where('user_id', $this->user->id)->firstOrFail();
            $patient->card_id = '//identity//'.$fileName;
            $patient->save();

            return response()->json(['message' => 'imagen de cédula guardada correctamente']);
        } catch (\Throwable $th) {
            Storage::delete($this->user->user_folder.'//licenses//'.$fileName);
            return response()->json(['error' => $th->getMessage()], 503);
        } 
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
