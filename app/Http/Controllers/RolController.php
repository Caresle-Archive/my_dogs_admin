<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index(Request $request) {
        return inertia('Rol/Rol');
    }

    public function create() {
        return inertia('Rol/RolForm');
    }

    public function store(Request $request) {}

    public function show(string $id) {
        return inertia('Rol/RolForm', [
            'show' => true,
        ]);
    }

    public function edit(string $id) {
        $rol = Rol::where('id', '=', $id)->first();

        return inertia('Rol/RolForm', [
            'isEdit' => true,
            'rol' => $rol,
        ]);
    }

    public function update(Request $request, string $id) {}

    public function destroy(string $id) {
        if (Rol::all()->count() <= 1)
            return back()->withErrors(['general' => 'The system need atleast 1 rol to work']);

        // Validate if role is not in use
        $role = User::where('rol', '=', $id)->count();

        if ($role > 0)
            return back()->withErrors(['general' => 'You can\'t delete a rol that is in use']);

        Rol::where('id', '=', $id)->delete();

        return to_route('rol.index');
    }
}
