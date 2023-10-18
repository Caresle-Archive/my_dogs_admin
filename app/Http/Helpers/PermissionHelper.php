<?php

namespace App\Http\Helpers;

use App\Models\Permission;
use App\Models\Rol;
use App\Models\RolHasPermission;

final class PermissionHelper
{
    const ADMIN = 1;

    // User
    const GET_USER = 2;
    const POST_USER = 3;
    const PUT_USER = 4;
    const DELETE_USER = 5;

    // Role
    const GET_ROLE = 6;
    const POST_ROLE = 7;
    const PUT_ROLE = 8;
    const DELETE_ROLE = 9;

    // DOG
    const GET_DOG = 10;
    const POST_DOG = 11;
    const PUT_DOG = 12;
    const DELETE_DOG = 13;

    // DOG
    const GET_DOG_TYPE = 14;
    const POST_DOG_TYPE = 15;
    const PUT_DOG_TYPE = 16;
    const DELETE_DOG_TYPE = 17;

    public static function hasRight(Rol $rol, int $right = -1) : bool
    {
        if (!isset($rol) || $right == -1) return false;

        $rights_rol = RolHasPermission::where('rol_id', '=', $rol->id)->get();

        // Get the permission linked with the rol
        $rights = [];
        foreach ($rights_rol as $right_to_get) {
            array_push($rights, $right_to_get->permission_id);
        }
        dd(in_array(PermissionHelper::ADMIN, $rights));
        if (!in_array($right, $rights) || !in_array(PermissionHelper::ADMIN, $rights))
            return false;

        return true;
    }
}
