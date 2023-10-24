<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $users = User::with(['role'])->get();
        $roles = Role::all();

        return Inertia::render('User/User', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
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
            'role' => 'required|integer|exists:role,id',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->rol = $request->rol;
        $user->save();

        return to_route('users.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('role')->where('id', '=', $id)->first();
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
        $roles = Role::all();

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
            'role' => 'required|integer|'
        ]);

        $input = [
            'username' => $request->username,
            'role' => $request->role,
        ];

        if (isset($request->password))
            $input['password'] = bcrypt($request->password);

        User::where('id', '=', $id)->update($input);
        return to_route('users.index')->with('message_info', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (User::all()->count() <= 1)
            return back()->withErrors(['general' => 'You need to have at least 1 user in the system']);

        User::where('id', '=', $id)->delete();

        return to_route('users.index')->with('message', 'User deleted successfully');
    }
}
