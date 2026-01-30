<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\ClientBillingController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
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

Route::get('', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('client', ClientController::class)->middleware('auth');
Route::resource('client.billing', ClientBillingController::class)->middleware('auth');
Route::resource('billing', BillingController::class)->middleware('auth');
