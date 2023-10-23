<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\PermissionHelper;

Route::get("/role", [RoleController::class, "index"])
    ->name("role.index")
    ->middleware("has_right:" . PermissionHelper::GET_ROLE);

Route::post("/role", [RoleController::class, "store"])
    ->name("role.store")
    ->middleware("has_right:" . PermissionHelper::POST_ROLE);

Route::get("/role/create", [RoleController::class, "create"])
    ->name("role.create")
    ->middleware("has_right:" . PermissionHelper::POST_ROLE);

Route::get("/role/{role}", [RoleController::class, "show"])
    ->name("role.show")
    ->middleware("has_right:" . PermissionHelper::GET_ROLE);

Route::put("/role/{role}", [RoleController::class, "update"])
    ->name("role.update")
    ->middleware("has_right:" . PermissionHelper::PUT_ROLE);

Route::delete("/role/{role}", [RoleController::class, "destroy"])
    ->name("role.destroy")
    ->middleware("has_right:" . PermissionHelper::DELETE_ROLE);

Route::get("/role/{role}/edit", [RoleController::class, "edit"])
    ->name("role.edit")
    ->middleware("has_right:" . PermissionHelper::PUT_ROLE);



