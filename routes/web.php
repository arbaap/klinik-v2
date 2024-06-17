<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

// Auth::routes();

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('order/getOrderId', [OrderController::class, 'getOrderId'])->name('order.getOrderId');
Route::get('customer/getCustomerById', [CustomerController::class, 'getCustomerById'])->name('customer.getCustomerById');
Route::get('book/getPriceById', [BookController::class, 'getPriceById'])->name('book.getPriceById');
Route::get('user/getUserById', [UserController::class, 'getUserById'])->name('user.getUserById');

Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses.login');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses.register');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('book', BookController::class);
    Route::resource('order', OrderController::class);
    Route::resource('user', UserController::class);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');