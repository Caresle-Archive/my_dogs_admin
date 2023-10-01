<?php

use App\Http\Controllers\DogsTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/dogs_type', [DogsTypeController::class, 'index'])->name('dogs_type');
