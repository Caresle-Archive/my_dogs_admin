<?php

use App\Http\Controllers\DogsController;
use Illuminate\Support\Facades\Route;

Route::resource('/dogs', DogsController::class);
