<?php

use App\Http\Controllers\DogsBreedController;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\PermissionHelper;

Route::get("/dogs_breed", [DogsBreedController::class, "index"])
    ->name("dogs_breed.index")
    ->middleware("has_right:" . PermissionHelper::GET_DOG_TYPE);

Route::post("/dogs_breed", [DogsBreedController::class, "store"])
    ->name("dogs_breed.store")
    ->middleware("has_right:" . PermissionHelper::POST_DOG_TYPE);

Route::get("/dogs_breed/create", [DogsBreedController::class, "create"])
    ->name("dogs_breed.create")
    ->middleware("has_right:" . PermissionHelper::POST_DOG_TYPE);

Route::get("/dogs_breed/{dogs_breed}", [DogsBreedController::class, "show"])
    ->name("dogs_breed.show")
    ->middleware("has_right:" . PermissionHelper::GET_DOG_TYPE);

Route::put("/dogs_breed/{dogs_breed}", [DogsBreedController::class, "update"])
    ->name("dogs_breed.update")
    ->middleware("has_right:" . PermissionHelper::PUT_DOG_TYPE);

Route::delete("/dogs_breed/{dogs_breed}", [DogsBreedController::class, "destroy"])
    ->name("dogs_breed.destroy")
    ->middleware("has_right:" . PermissionHelper::DELETE_DOG_TYPE);

Route::get("/dogs_breed/{dogs_breed}/edit", [DogsBreedController::class, "edit"])
    ->name("dogs_breed.edit")
    ->middleware("has_right:" . PermissionHelper::PUT_DOG_TYPE);
