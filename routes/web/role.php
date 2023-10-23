<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\PermissionHelper;

Route::get("/rol", [RoleController::class, "index"])
    ->name("role.index")
    ->middleware("has_right:" . PermissionHelper::GET_ROLE);

Route::post("/rol", [RoleController::class, "store"])
    ->name("role.store")
    ->middleware("has_right:" . PermissionHelper::POST_ROLE);

Route::get("/rol/create", [RoleController::class, "create"])
    ->name("role.create")
    ->middleware("has_right:" . PermissionHelper::POST_ROLE);

Route::get("/rol/{rol}", [RoleController::class, "show"])
    ->name("role.show")
    ->middleware("has_right:" . PermissionHelper::GET_ROLE);

Route::put("/rol/{rol}", [RoleController::class, "update"])
    ->name("role.update")
    ->middleware("has_right:" . PermissionHelper::PUT_ROLE);

Route::delete("/rol/{rol}", [RoleController::class, "destroy"])
    ->name("role.destroy")
    ->middleware("has_right:" . PermissionHelper::DELETE_ROLE);

Route::get("/rol/{rol}/edit", [RoleController::class, "edit"])
    ->name("role.edit")
    ->middleware("has_right:" . PermissionHelper::PUT_ROLE);



