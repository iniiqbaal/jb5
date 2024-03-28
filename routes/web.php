<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;

Route::resource('/laptops', \App\Http\Controllers\LaptopController::class);

Route::resource('/', \App\Http\Controllers\HomeController::class);