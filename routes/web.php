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

//Route for login logout and registration
Auth::routes();

//Route for the HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route for the FrienbookController, so 
Route::resource('friends', FriendbookController::class);

//Route for the FrienbookController, so
//Route::get('/friends', [App\Http\Controllers\FriendbookController::class, 'search']);
//Route::resource('friends.search', FriendbookController::class);
Route::get('/friends-search', [FriendbookController::class, 'search'])->name('friends-search');


