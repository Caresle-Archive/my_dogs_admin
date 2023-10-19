<?php

use App\Http\Controllers\DogsTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\PermissionHelper;

Route::get("/dogs_type", [DogsTypeController::class, "index"])
    ->name("dogs_type.index")
    ->middleware("has_right:" . PermissionHelper::GET_DOG_TYPE);

Route::post("/dogs_type", [DogsTypeController::class, "store"])
    ->name("dogs_type.store")
    ->middleware("has_right:" . PermissionHelper::POST_DOG_TYPE);

Route::get("/dogs_type/create", [DogsTypeController::class, "create"])
    ->name("dogs_type.create")
    ->middleware("has_right:" . PermissionHelper::POST_DOG_TYPE);

Route::get("/dogs_type/{dogs_type}", [DogsTypeController::class, "show"])
    ->name("dogs_type.show")
    ->middleware("has_right:" . PermissionHelper::GET_DOG_TYPE);

Route::put("/dogs_type/{dogs_type}", [DogsTypeController::class, "update"])
    ->name("dogs_type.update")
    ->middleware("has_right:" . PermissionHelper::PUT_DOG_TYPE);

Route::delete("/dogs_type/{dogs_type}", [DogsTypeController::class, "destroy"])
    ->name("dogs_type.destroy")
    ->middleware("has_right:" . PermissionHelper::DELETE_DOG_TYPE);

Route::get("/dogs_type/{dogs_type}/edit", [DogsTypeController::class, "edit"])
    ->name("dogs_type.edit")
    ->middleware("has_right:" . PermissionHelper::PUT_DOG_TYPE);
