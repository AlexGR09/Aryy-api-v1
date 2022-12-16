<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        return ok('',Plan::all());
    }
}
