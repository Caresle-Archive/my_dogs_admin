<?php

use App\Http\Controllers\DogsController;
use Illuminate\Support\Facades\Route;

use App\Http\Helpers\PermissionHelper;

Route::get("/dogs", [DogsController::class, "index"])
    ->name("dogs.index")
    ->middleware("has_right:" . PermissionHelper::GET_DOG);

Route::post("/dogs", [DogsController::class, "store"])
    ->name("dogs.store")
    ->middleware("has_right:" . PermissionHelper::POST_DOG);

Route::get("/dogs/create", [DogsController::class, "create"])
    ->name("dogs.create")
    ->middleware("has_right:" . PermissionHelper::POST_DOG);

Route::get("/dogs/{dog}", [DogsController::class, "show"])
    ->name("dogs.show")
    ->middleware("has_right:" . PermissionHelper::GET_DOG);

Route::put("/dogs/{dog}", [DogsController::class, "update"])
    ->name("dogs.update")
    ->middleware("has_right:" . PermissionHelper::PUT_DOG);

Route::delete("/dogs/{dog}", [DogsController::class, "destroy"])
    ->name("dogs.destroy")
    ->middleware("has_right:" . PermissionHelper::DELETE_DOG);

Route::get("/dogs/{dog}/edit", [DogsController::class, "edit"])
    ->name("dogs.edit")
    ->middleware("has_right:" . PermissionHelper::PUT_DOG);
