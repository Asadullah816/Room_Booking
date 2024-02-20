<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginRegisterController;

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
Route::view('emailform', 'home.emailform');
Route::controller(AdminController::class)->group(function () {
});
Route::view('roomcancel', 'cancel_rooms')->name('cancel_room');
Route::controller(HomeController::class)->group(function () {
    Route::get('check', 'showCheck')->name('checkRoom');
    Route::get('viewroom/{id}', 'viewroom')->name('viewroom');
    Route::get('booking_form/{id}', 'booking_form')->name('booking_form');
    Route::post('booking', 'booking')->name('booking');
    Route::post('room_check', 'checkroom')->name('room_check');
    Route::post('emailsend', 'mailsend')->name('sendemail');
    Route::get('sendemail', 'mailsend')->name('sendemail');
    Route::get('cancelRoom', 'cancelRoom')->name('roomcencel');
    Route::POST('CancelRoom', 'cancelRoom')->name('Roomcencel');
    Route::get('deletebooking/{id}', 'deleteBooking')->name('deletebooking');
});
Route::view('register', 'auth.register')->name('register');
Route::view('login', 'auth.login')->name('register');
Route::controller(LoginRegisterController::class)->group(function () {
    // Route::post('login')
    Route::post('register', 'register')->name('register');
    Route::get('logout', 'logout')->name('logout');
    Route::post('login', 'login')->name('login');
});
Route::middleware('auth')->controller(AdminController::class)->group(function () {
    Route::view('addroom', 'admin.addroom')->name('addroom');
    Route::post('Addroom', 'addroom')->name("Addroom");
    Route::get('roomtable', 'roomtable')->name('roomtable');
});
