<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationsController;

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

Route::get('/', function () {
    return view('/welcome');
});

Route::get('contact', function(){
    return view('/contact');
});

Route::controller(App\Http\Controllers\ReservationController::class)->group(function(){
    Route::get('/reservation', [ReservationsController::class, 'index']);
    Route::get('/reservation/create', [ReservationsController::class, 'create']);
    Route::get('/reservation/edit/{slug}', [ReservationsController::class, 'edit']);
    Route::post('/reservation/store', [ReservationsController::class, 'addOrUpdate']);
    Route::post('/reservation/update/{slug}', [ReservationsController::class, 'addOrUpdate']);
    Route::delete('/reservation/delete/{slug}', [ReservationsController::class, 'delete']);
    Route::post('/reservation/date', [ReservationsController::class, 'search']);
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index']);
