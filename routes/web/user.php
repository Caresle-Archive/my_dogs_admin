<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
// Route::get('/users', [UserController::class, 'index'])->name('users');
// Route::post('/users', [UserController::class, 'post'])->name('users.create');
