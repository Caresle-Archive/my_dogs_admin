<?php

use App\Http\Controllers\DogsTypeController;
use Illuminate\Support\Facades\Route;

Route::resource('/dogs_type', DogsTypeController::class)->except('show');
