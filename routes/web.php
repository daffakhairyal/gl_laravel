<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PettyCashController;
use App\Http\Controllers\TransferBankController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AccountController;


// Rute yang memerlukan middleware web
Route::middleware(['web'])->group(function () {
    // Rute untuk menampilkan formulir login
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    // Rute untuk melakukan proses login
    Route::post('/', [AuthController::class, 'login']);
    // Rute untuk menampilkan formulir registrasi
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    // Rute untuk melakukan proses registrasi
    Route::post('/register', [AuthController::class, 'register']);
    // Rute untuk melakukan proses logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/password/reset', [PasswordResetController::class, 'showResetForm'])->name('password.request');
    Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.update');
    Route::get('/dashboard',[Home::class,'dashboard']);
    Route::get('/simple-table',[Home::class,'index'])->name('user.create');
    Route::get('/petty-cash',[PettyCashController::class,'index']);
    Route::get('/transfer-bank',[TransferBankController::class,'index']);
    Route::get('/division',[DivisionController::class,'index']);
    Route::get('/user',[User::class,'index']);
    Route::get('/create',[Home::class,'create']);
    Route::resource('accounts', AccountController::class);
    Route::resource('pettyCash', PettyCashController::class);
    Route::post('/petty-cash/{id}/update-status', [PettyCashController::class, 'updateStatus'])->name('pettyCash.updateStatus');
    Route::get('/search-accounts', [AccountController::class, 'search'])->name('accounts.search');


});
