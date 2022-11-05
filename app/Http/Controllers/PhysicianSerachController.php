<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalService;
use App\Models\Physician;


class PhysicianSerachController extends Controller
{
    
    public function index()
    {
        $physician = Physician::where('id',2)->with('medical_services')->first();
        return $physician;
    }
 
    public function store(Request $request)
    {
        //
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
