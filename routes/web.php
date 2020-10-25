<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/reservation', [ReservationController::class, 'reservation'])->name('reservation');
Route::get('/reservation/place', [ReservationController::class, 'reservationPlace'])->name('reservation_place');
Route::post('/reservation/add/{id}', [ReservationController::class, 'reservationAdd'])->name('reservation_add');
Route::post('/reservation/remove/{id}', [ReservationController::class, 'reservationRemove'])->name('reservation_remove');
Route::post('/reservation/place', [ReservationController::class, 'reservationConfirm'])->name('reservation_confirm');

Route::get('/rooms', [MainController::class, 'rooms'])->name('rooms');
Route::get('/rooms/{room?}', [MainController::class, 'room'])->name('room');

Route::get('/games', [MainController::class, 'games'])->name('games');
Route::get('/games/{id?}', [MainController::class, 'game'])->name('game');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes([
    'reset' => false,
    'confirm'=>false,
    'verify'=>false,
    'admin'=>false,
    ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
