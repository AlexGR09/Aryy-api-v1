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

            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();

            $file = $request->file('id_card');
            $fileName = $file->getClientOriginalName();
            $file->storeAs($this->user->user_folder . $patient->patient_folder . '//identity//', $fileName);

            Storage::delete($this->user->user_folder . $patient->patient_folder . '//identity//');

            $patient->id_card = $fileName;
            $patient->save();

            return (new IdentityResource($patient))->additional(['message' => 'Imagen guardada con exito.']);
        } catch (\Throwable $th) {
            Storage::delete($this->user->user_folder . '//identity//' . $fileName);
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();
            $path = $this->user->user_folder . $patient->patient_folder . '//identity//' . $patient->id_card;
            
            $image = Storage::get($path);

            return response($image, 200)->header('Content-Type', Storage::mimeType($path));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request,$id)
    {
        //
    }

    public function destroy()
    {
        try {
            $patient = Patient::where('user_id', auth()->id())
                ->firstOrFail();
            $path = $this->user->user_folder . $patient->patient_folder . '//identity//' . $patient->id_card;;
            Storage::delete($path);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
