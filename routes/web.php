<?php

use App\Http\Controllers\LaptopController;
use App\Http\Controllers\TambahDataController;
use Illuminate\Support\Facades\Route;

Route::resource('/laptops', \App\Http\Controllers\LaptopController::class);

Route::get('/tambah', [TambahDataController::class, 'tambah']);