<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::controller(AdminController::class)->group(function(){
    Route::view('addroom', 'admin.addroom')->name('addroom');
    Route::post('Addroom','addroom')->name("Addroom");
    Route::get('roomtable','roomtable')->name('roomtable');
    Route::get('viewroom/{id}','viewroom')->name('viewroom');
});
Route::controller(HomeController::class)->group(function(){
    Route::get('booking_form','booking_form')->name('booking_form');
    Route::post('booking','booking')->name('booking');
    Route::post('room_check','checkroom')->name('room_check');
});
Route::view('check', 'home.checkin');
