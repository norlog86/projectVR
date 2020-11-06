<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Route::group(['prefix' => 'reservation'], function () {

    Route::post('/add/{id}', [ReservationController::class, 'reservationAdd'])->name('reservation_add');

    Route::group([
        'middleware' => [
            'reservation_not_empty',
            'reservation_more_one',
        ],
//        'middleware' => 'reservation_more_one',

    ], function () {
        Route::get('/', [ReservationController::class, 'reservation'])->name('reservation');
        Route::get('/place', [ReservationController::class, 'reservationPlace'])->name('reservation_place');
        Route::post('/remove/{id}', [ReservationController::class, 'reservationRemove'])->name('reservation_remove');
        Route::post('/place', [ReservationController::class, 'reservationConfirm'])->name('reservation_confirm');
    });
});


Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');
Route::post('/drop', [ReservationController::class, 'reservationDrop'])->name('reservation_drop');

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
    'confirm' => false,
    'verify' => false,
    'admin' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
