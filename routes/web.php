<?php

use App\Http\Controllers\PlayerController;
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

Route::get('/', function () {
    return view('pages.base.home');
})->name('home');

// Player routes
Route::resource('player', PlayerController::class);
Route::put('player/{player}/confirmation', [PlayerController::class, 'confirmOrRetrievePresence'])->name('player.confirm');
