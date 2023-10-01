<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index(Request $request) {
        return inertia('Rol/Rol');
    }
}
