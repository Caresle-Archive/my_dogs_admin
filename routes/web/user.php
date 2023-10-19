<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\PermissionHelper;

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index')
    ->middleware("has_right:" . PermissionHelper::GET_USER);

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store')
    ->middleware("has_right:" . PermissionHelper::POST_USER);

Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create')
    ->middleware("has_right:" . PermissionHelper::POST_USER);

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show')
    ->middleware("has_right:" . PermissionHelper::GET_USER);

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update')
    ->middleware("has_right:" . PermissionHelper::PUT_USER);

Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware("has_right:" . PermissionHelper::DELETE_USER);

Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit')
    ->middleware("has_right:" . PermissionHelper::PUT_USER);
