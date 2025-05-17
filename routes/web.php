<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrazbaController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/', [DrazbaController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\DrazbaController::class, 'index'])->name('home');

/* Route::get('/create', [DrazbaController::class, 'create'])->name('drazbas.create');
Route::post('/auctions', [DrazbaController::class, 'store'])->name('drazbas.store'); */

Route::middleware(['auth'])->group(function () {
    Route::get('/create', [DrazbaController::class, 'create'])->name('drazbas.create');
    Route::post('/auctions', [DrazbaController::class, 'store'])->name('drazbas.store');
});