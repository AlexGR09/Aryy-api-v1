<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use App\Models\encryp;
use App\Models\Specialty;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;


class PruebaEncryp extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $json = Storage::disk('local')->get('/json/specialties.json');
        $data = json_decode($json,true);

        $json2 = Storage::disk('local')->get('/json/medical_service.json');
        $data2 = json_decode($json2,true);

        

       /*  foreach($data as $obj){
           $specialty = Specialty::where('name',$obj)->pluck('id')->first();


           return $specialty;
        } */


    
      
      
       /*  $array = array_unique($data,SORT_STRING);
        $array = array_values($array);
        return json_encode($array);
    
      return "f"; */
            
       /*  $encryptedValue = encryp::find(2);
        return $encryptedValue;
        try {
            $decrypted = Crypt::decryptString($encryptedValue->name);
            return $decrypted;
        } catch (DecryptException $e) {} */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$encryp= new Encryp;
          /* 
          $encryp->name = Crypt::encryptString($request->name);
          $encryp->save(); */
          $encryp->name = Hash::make($request->newPassword);
          $encryp->save();
        return $encryp;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, encryp $request)
    {
        
      $encryptedValue = encryp::where('id',$id)->first();
        
        /* if (Hash::check($request->name, $encryptedValue->name)) {
            return  "se encontro"." ".$encryptedValue; */
            // The passwords match...
        /*   */
        try {
            $decrypted = Crypt::decryptString($encryptedValue->name);
            return $decrypted;
        } catch (DecryptException $e) {}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
