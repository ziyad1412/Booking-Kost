<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//homecontroller route /

Route::get('/', [HomeController::class, 'index'])->name('home');
//booking
Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
//find-kost
Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
//kos detail
Route::get('/kos/{slug}', [BoardingHouseController::class, 'show'])->name('kos.show');
//rooms
Route::get('/kos/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('kos.rooms');
//find-results
Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');
//category
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/city/{slug}', [CityController::class, 'show'])->name('city.show');
//booking
Route::get('/kos/booking/{slug}', [BookingController::class, 'booking'])->name('booking');
Route::get('/kos/booking/{slug}/information', [BookingController::class, 'information'])->name('booking.information');
Route::post('/kos/booking/{slug}/information/save', [BookingController::class, 'saveInformation'])->name('booking.information.save');

Route::get('/kos/booking/{slug}/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
Route::post('/kos/booking/{slug}/payment', [BookingController::class, 'payment'])->name('booking.payment');
