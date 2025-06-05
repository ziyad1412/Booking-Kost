<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//homecontroller route /

Route::get('/', [HomeController::class, 'index'])->name('home');
//booking
Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
//find-kost
Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
//find-results
Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');
//category
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
