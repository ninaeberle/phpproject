<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FriendbookController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/session/get',[SessionController::class, "getSessionData"]);

Route::get('/session/set',[SessionController::class, "storeSessionData"]);

Route::get('/session/remove',[SessionController::class, "deleteSessionData"]);

Route::resource('friends', FriendbookController::class);

