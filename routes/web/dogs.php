<?php

use App\Http\Controllers\DogsController;
use Illuminate\Support\Facades\Route;

Route::get('/dogs', [DogsController::class, 'index'])->name('dogs');
