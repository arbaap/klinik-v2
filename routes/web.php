<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\DoctorRegisterController;
use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\UserLoginController;
// Auth::routes();


Route::get('/', function () {
    return view('welcome');
});


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
    Route::resource('customer', CustomerController::class);
    Route::resource('book', BookController::class);
    Route::resource('order', OrderController::class);
    Route::resource('dokter', DoctorController::class);
});

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
});


//dokter

Route::get('/doctors', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctor/register', [DoctorRegisterController::class, 'showRegistrationForm'])->name('doctor.register.show');
Route::post('/doctor/register', [DoctorRegisterController::class, 'register'])->name('doctor.register.submit');
Route::get('/doctor/login', [DoctorLoginController::class, 'showLoginForm'])->name('doctor.login.show');
Route::post('/doctor/login', [DoctorLoginController::class, 'login'])->name('doctor.login.submit');



// pasien

Route::get('user/register', [UserRegisterController::class, 'showRegistrationForm'])->name('user.register.show');
Route::post('user/register', [UserRegisterController::class, 'register'])->name('user.register.submit');
Route::get('user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login.show');

Route::post('user/login', [UserLoginController::class, 'login'])->name('user.login.submit');
Route::post('user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
