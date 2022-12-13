<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\TaxDataRequest;
use App\Http\Resources\API\V1\Physician\TaxDataResource;
use App\Models\TaxData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TaxDataController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Physician')->only(['store', 'update']);
    }

    public function index()
    {
        //
    }

    public function store(TaxDataRequest $request)
    {
        try {
            DB::beginTransaction();

            $file = $request->file('constancy');
            $fileName = $file->getClientOriginalName();
            $file->storeAs($this->user->user_folder.'//tax_data//', $fileName);

            $tax_data = new TaxData;
            $tax_data->user_id = $this->user->id;
            $tax_data->rfc = $request->rfc;
            $tax_data->taxpayer_name = $request->taxpayer_name;
            $tax_data->tax_regime = $request->tax_regime;
            $tax_data->tax_email = $request->tax_email;
            $tax_data->tax_residence = $request->tax_residence;

            $tax_data->constancy = '//tax_data//'.$fileName;

            $tax_data->save();

            DB::commit();

            return (new TaxDataResource($tax_data))->additional(['message' => 'Informacion guardada con exito.']);
        } catch (\Throwable $th) {
            Storage::delete($this->user->user_folder.'//tax_data//'.$fileName);

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            $tax_data = TaxData::where('user_id', $this->user->id)->first();
            $path = $this->user->user_folder.$tax_data->constancy;
            Storage::get($path);
            //return response($image, 200)->header('Content-Type', Storage::mimeType($path));
            return (new TaxDataResource($tax_data))->additional(['message' => 'Informacion guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request)
    {
        $file = $request->file('constancy');
        $fileName = $file->getClientOriginalName();
        $file->storeAs($this->user->user_folder . '//tax_data//', $fileName);
        

        $tax_data = TaxData::where('user_id', $this->user->id)->first();
        $tax_data->rfc = $request->rfc;
        $tax_data->taxpayer_name = $request->taxpayer_name;
        $tax_data->tax_regime = $request->tax_regime;
        $tax_data->tax_email = $request->tax_email;
        $tax_data->tax_residence = $request->tax_residence;
        Storage::delete($this->user->user_folder.'//tax_data//' . $request->constacy);
        $tax_data->constancy = '//tax_data//'. $fileName;
        $tax_data->save();
        /* $tax_data = TaxData::where('user_id', $this->user->id)->get();
        return $request; */
    }

    public function destroy()
    {
        try {
            $tax_data = TaxData::where('user_id', $this->user->id)->first();
            $path = $this->user->user_folder.$tax_data->constancy;
            Storage::delete($path);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
