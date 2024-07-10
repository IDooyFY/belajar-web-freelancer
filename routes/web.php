<?php

use Illuminate\Support\Facades\Route;

// front (Landing)
use App\Http\Controllers\Landing\LandingController;



// member ( Dashboard )
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\MyOrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\ServiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('explore', LandingController::class, 'explore')->name('explore.landing');
Route::get('detail/{id}', LandingController::class, 'detail')->name('detail.landing');
Route::get('booking/{id}', LandingController::class, 'booking')->name('booking.landing');
Route::get('detail_booking/{id}', LandingController::class, 'detail_booking')->name('detail. booking.landing');
Route::resource('/', LandingController::class);
