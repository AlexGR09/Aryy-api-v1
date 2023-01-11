<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\ObgynBackground;
use Illuminate\Http\Request;

class GynecologicalHistoryController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //$gynecologicalHistory = ObgynBackground::create([$request]);

    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        //
    }
}
