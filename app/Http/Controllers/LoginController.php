<?php

namespace App\Http\Controllers;

use App\Http\Helpers\HttpResponses;
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
        $json = json_decode($request->getContent());

        $validator = Validator::make((array)$json, [
            'username' => 'required|string|min:3',
            'password' => 'required|string|min:3',
        ]);

        if ($validator->fails())
            return HttpResponses::Error('Login/Login', data: $validator->errors());

        dd($json);
    }
}
