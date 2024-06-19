<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegistrationKlinikController;
use App\Http\Controllers\UserController;

// Auth::routes();

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');



Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//admin
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');


Route::get('user/getUserById', [UserController::class, 'getUserById'])->name('user.getUserById');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses.login');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses.register');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::resource('user', UserController::class);
    Route::resource('daftar-regist', RegistrationKlinikController::class);
});


// pasien
Route::get('home', [AuthController::class, 'home'])->name('home');
Route::get('registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::get('/registrations', [RegistrationKlinikController::class, 'index'])->name('registrations.index');
Route::post('proses-registration', [AuthController::class, 'processRegistration'])->name('proses.registrationklinik');
Route::get('/riwayat', [RegistrationKlinikController::class, 'show'])->name('registrations.show');


// dokter
Route::get('/notif', [DoctorController::class, 'index'])->name('dokter.index');
Route::post('/doctor/registrations/{id}/add-prescription', [DoctorController::class, 'addPrescription'])->name('doctor.addPrescription');
