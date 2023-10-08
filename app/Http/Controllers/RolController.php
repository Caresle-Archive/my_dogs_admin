<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Rol;
use App\Models\RolHasPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolController extends Controller
{
    public function index(Request $request) {
        $roles = Rol::all();
        return inertia('Rol/Rol', [
            'roles' => $roles,
        ]);
    }

    public function create() {
        $permissions = Permission::all();
        return inertia('Rol/RolForm', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|unique:rol,name',
            'permission' => 'required|array|min:1',
            'permission.*' => 'required|integer|exists:permission,id',
        ]);

        $id = Rol::create([
            'name' => $request->name,
        ])->id;

        $permissions = $request->permission;
        foreach ($permissions as $permission) {
            RolHasPermission::create([
                'rol_id' => $id,
                'permission_id' => $permission,
            ]);
        }

        return to_route('rol.index');
    }

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

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => ['required', 'string', 'min:3', Rule::unique('rol', 'name')->ignore($id)],
            'permissions.*' => 'required|integer|exists:permission,id',
        ]);

        Rol::where('id', '=', $id)->update([
            'name' => $request->name,
        ]);

        // Drop the permission of the rol and reinsert all of them
        RolHasPermission::where('rol_id', '=', $id)->delete();

        $permissions = $request->permissions;

        foreach ($permissions as $permission) {
            RolHasPermission::create([
                'permission_id' => $permission,
                'rol_id' => $id,
            ]);
        }

        return to_route('rol.index');
    }

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
