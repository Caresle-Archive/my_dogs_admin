<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index(Request $request) {
        $roles = Role::all();
        return inertia('Role/Role', [
            'roles' => $roles,
        ]);
    }

    public function create() {
        $permissions = Permission::all();
        return inertia('Role/RoleForm', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|unique:role,name',
            'permission' => 'required|array|min:1',
            'permission.*' => 'required|integer|exists:permission,id',
        ]);

        $id = Role::create([
            'name' => $request->name,
        ])->id;

        $permissions = $request->permission;
        foreach ($permissions as $permission) {
            RoleHasPermission::create([
                'role_id' => $id,
                'permission_id' => $permission,
            ]);
        }

        return to_route('role.index')->with('message', 'Role created successfully');
    }

    public function show(string $id) {
        return inertia('Role/RoleForm', [
            'show' => true,
        ]);
    }

    public function edit(string $id) {
        $role = Role::with('permissions')->where('id', '=', $id)->first();
        $permissions = Permission::all();

        $role_permission = RoleHasPermission::where('role_id', '=', $id)->get();
        foreach ($role_permission as $item) {
            foreach ($permissions as $permission) {
                if ($permission->id == $item->permission_id) {
                    $permission->setAttribute('permission_selected', true);
                }
            }
        }

        return inertia('Role/RoleForm', [
            'isEdit' => true,
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => ['required', 'string', 'min:3', Rule::unique('role', 'name')->ignore($id)],
            'permissions.*' => 'required|integer|exists:permission,id',
        ]);

        Role::where('id', '=', $id)->update([
            'name' => $request->name,
        ]);

        // Drop the permission of the rol and reinsert all of them
        RoleHasPermission::where('role_id', '=', $id)->delete();

        $permissions = $request->permissions;

        foreach ($permissions as $permission) {
            RoleHasPermission::create([
                'permission_id' => $permission,
                'role_id' => $id,
            ]);
        }

        return to_route('role.index')->with('message_info', 'Role updated successfully');
    }

    public function destroy(string $id) {
        if (Role::all()->count() <= 1)
            return back()->withErrors(['general' => 'The system need atleast 1 rol to work']);

        // Validate if role is not in use
        $role = User::where('role', '=', $id)->count();

        if ($role > 0)
            return back()->withErrors(['general' => 'You can\'t delete a rol that is in use']);

        Role::where('id', '=', $id)->delete();

        return to_route('role.index')->with('message', 'Role deleted successfully');
    }
}
