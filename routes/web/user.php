<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\PermissionHelper;

$get_user = PermissionHelper::GET_USER;
$post_user = PermissionHelper::POST_USER;
$put_user = PermissionHelper::PUT_USER;
$delete_user = PermissionHelper::DELETE_USER;

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index')
    ->middleware("has_right:$get_user");

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store')
    ->middleware("has_right:$post_user");

Route::get('/users/create', [UserController::class, 'create'])
    ->name('users.create')
    ->middleware("has_right:$post_user");

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show')
    ->middleware("has_right:$get_user");

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update')
    ->middleware("has_right:$put_user");

Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware("has_right:$delete_user");

Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit')
    ->middleware("has_right:$put_user");
