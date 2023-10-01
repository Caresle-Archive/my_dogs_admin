<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() {
        return Inertia::render('Login/Login');
    }

    public function store(Request $request) {
        $request->validate([
            'username' => 'required|string|min:3',
            'password' => 'required|string|min:3',
        ]);

        $json = json_decode($request->getContent());

        $user = User::where([
            ['username', '=', $json->username],
        ])->first();

        if (!isset($user))
            return back()->withErrors(['general' => 'Check the given information']);
    }
}
