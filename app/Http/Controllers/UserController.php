<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $rols = Rol::all();

        return Inertia::render('User/User', [
            'users' => $users,
            'roles' => $rols,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return Inertia::render('User/UserForm', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:5|unique:users,username',
            'password' => 'required|string|min:5',
            'rol' => 'required|integer|exists:rol,id',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->rol = $request->rol;
        $user->save();

        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('rol')->where('id', '=', $id)->first();
        return Inertia::render('User/UserShow', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', '=', $id)->first();
        $roles = Rol::all();

        return Inertia::render('User/UserForm', [
            'isEdit' => true,
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:5', Rule::unique('users', 'username')->ignore($id)],
            'password' => 'nullable|string|min:5',
            'password_confirm' => 'same:password',
            'rol' => 'required|integer|'
        ]);

        $input = [
            'username' => $request->username,
            'rol' => $request->rol,
        ];

        if (isset($request->password))
            $input['password'] = bcrypt($request->password);

        User::where('id', '=', $id)->update($input);
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (User::all()->count() <= 1)
            return back()->withErrors(['general' => 'You need to have at least 1 user in the system']);

        User::where('id', '=', $id)->delete();

        return redirect()->to(route('users.index'));
    }
}
