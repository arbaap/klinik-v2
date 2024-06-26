<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('barangs', \App\Http\Controllers\BarangController::class)
    ->middleware('auth');

Route::resource('penjualans', \App\Http\Controllers\PenjualanController::class)
    ->middleware('auth');



// Route::get('/home', function () {
//     return view('home');
// })->name('home')->middleware('auth');