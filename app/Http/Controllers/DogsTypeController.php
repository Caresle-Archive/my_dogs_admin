<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogsTypeController extends Controller
{
    public function index(Request $request) {
        return inertia('DogsType/DogsType');
    }
}
