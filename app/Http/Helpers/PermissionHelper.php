<?php

namespace App\Http\Helpers;

use App\Models\Permission;
use App\Models\Rol;
use App\Models\RolHasPermission;

final class PermissionHelper
{
    final static int $ADMIN = 1;

    // User
    final static int $GET_USER = 2;
    final static int $POST_USER = 3;
    final static int $PUT_USER = 4;
    final static int $DELETE_USER = 5;

    // Role
    final static int $GET_ROLE = 6;
    final static int $POST_ROLE = 7;
    final static int $PUT_ROLE = 8;
    final static int $DELETE_ROLE = 9;

    // DOG
    final static int $GET_DOG = 10;
    final static int $POST_DOG = 11;
    final static int $PUT_DOG = 12;
    final static int $DELETE_DOG = 13;

    // DOG
    final static int $GET_DOG_TYPE = 14;
    final static int $POST_DOG_TYPE = 15;
    final static int $PUT_DOG_TYPE = 16;
    final static int $DELETE_DOG_TYPE = 17;

    public static function hasRight(Rol $rol, int $right = -1) : bool
    {
        $rights = RolHasPermission::where('rol_id', '=', $rol)->get();

        if (!in_array($right, $rights) || !in_array(PermissionHelper::$ADMIN, $rights))
            return false;

        return true;
    }
}
