<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;

Auth::routes();



Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//admin
Route::get('admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
// Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');


Route::get('user/getUserById', [UserController::class, 'getUserById'])->name('user.getUserById');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses.login');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses.register');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
    Route::get('daftar-regist', [UserController::class, 'pendaftaran'])->name('daftar-regist.index');
    Route::patch('admin/registrations/{id}/update-status', [UserController::class, 'updateStatus'])->name('registrations.updateStatus');
});



// pasien
Route::get('home', [PasienController::class, 'home'])->name('home');
Route::get('pendaftaran-klinik', [PasienController::class, 'showRegistrationForm'])->name('registration');
Route::get('/riwayat', [PasienController::class, 'show'])->name('registrations.show');
Route::post('proses-registration', [PasienController::class, 'processRegistration'])->name('proses.registrationklinik');


// dokter
Route::get('dokterhome', [DoctorController::class, 'dokterhome'])->name('dokterhome');
Route::get('/listPasien', [DoctorController::class, 'index'])->name('dokter.index');
Route::post('/doctor/registrations/{id}/add-prescription', [DoctorController::class, 'addPrescription'])->name('doctor.addPrescription');
