<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\Physician;
use Illuminate\Http\Request;

class PhysicianDetailController extends Controller
{
    public function show(Physician $physician )
    {
        return ok('',$physician->load('facilities'));
    }
}
