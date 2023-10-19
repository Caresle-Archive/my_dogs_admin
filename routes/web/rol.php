<?php

use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\PermissionHelper;

Route::get("/rol", [RolController::class, "index"])
    ->name("rol.index")
    ->middleware("has_right:" . PermissionHelper::GET_ROLE);

Route::post("/rol", [RolController::class, "store"])
    ->name("rol.store")
    ->middleware("has_right:" . PermissionHelper::POST_ROLE);

Route::get("/rol/create", [RolController::class, "create"])
    ->name("rol.create")
    ->middleware("has_right:" . PermissionHelper::POST_ROLE);

Route::get("/rol/{rol}", [RolController::class, "show"])
    ->name("rol.show")
    ->middleware("has_right:" . PermissionHelper::GET_ROLE);

Route::put("/rol/{rol}", [RolController::class, "update"])
    ->name("rol.update")
    ->middleware("has_right:" . PermissionHelper::PUT_ROLE);

Route::delete("/rol/{rol}", [RolController::class, "destroy"])
    ->name("rol.destroy")
    ->middleware("has_right:" . PermissionHelper::DELETE_ROLE);

Route::get("/rol/{rol}/edit", [RolController::class, "edit"])
    ->name("rol.edit")
    ->middleware("has_right:" . PermissionHelper::PUT_ROLE);



