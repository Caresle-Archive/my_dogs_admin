<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::all();
        $rols = Rol::all();

        return inertia('User/User', [
            'users' => $users,
            'roles' => $rols,
        ]);
    }

    public function post(Request $request) {
        $request->validate([
            'username' => 'required|string|min:5|unique:users,username',
            'password' => 'required|string|min:5',
            'rol' => 'required|exists:rol,id',
        ]);

        $json = json_decode($request->getContent());

        $user = new User;
        $user->username = $json->username;
        $user->password = bcrypt($json->password);
        $user->rol = $json->rol;
        $user->save();

        return redirect()->to(route('users'))->with('message', 'User created');
    }
}
