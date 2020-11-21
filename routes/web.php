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

//Route for the FrienbookController, so can get every function from the index blade
//middleware('auth') is responsible for the login, so you can't have access to the route without beeing logged in
Route::resource('friends', FriendbookController::class)->middleware('auth');

//Route for the FrienbookController, so it can get the search function
//middleware('auth') is responsible for the login, so you can't have access to the route without beeing logged in
Route::get('/friends-search', [FriendbookController::class, 'search'])->name('friends-search')->middleware('auth');



