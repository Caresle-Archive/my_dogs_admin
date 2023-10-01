<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogsController extends Controller
{
    public function index(Request $request) {
        return inertia('Dogs/Dogs');
    }
}
