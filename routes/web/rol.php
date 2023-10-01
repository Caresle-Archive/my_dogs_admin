<?php

use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

Route::get('/rol', [RolController::class, 'index'])->name('rol');
