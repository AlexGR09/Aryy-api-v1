<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionUserRequest;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubcriptionController extends Controller
{
    public function index()
    {
        return ok('',Subscription::all());
    }
}
