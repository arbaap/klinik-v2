<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
// Auth::routes();

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('order/getOrderId', [OrderController::class, 'getOrderId'])->name('order.getOrderId');
Route::get('customer/getCustomerById', [CustomerController::class, 'getCustomerById'])->name('customer.getCustomerById');
Route::get('book/getPriceById', [BookController::class, 'getPriceById'])->name('book.getPriceById');

Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses.login');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses.register');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // customer
    Route::resource('customer', CustomerController::class);

    // book
    Route::resource('book', BookController::class);


    // order
    Route::resource('order', OrderController::class);
});

// ini di komen juga
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');