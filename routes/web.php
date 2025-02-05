<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/action', [AuthController::class, 'loginAction'])->name('action.login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/action', [AuthController::class, 'registerAction'])->name('action.register');
Route::middleware('auth')->group(function () {
    Route::get('/', TransactionController::class)->name('dashboard.home');
    Route::get('/dashboard', TransactionController::class)->name('dashboard.home');
    Route::get('/dashboard/transactions', [TransactionController::class, 'transactions'])->name('transaction');
    Route::post('/transactions/create', [TransactionController::class, 'store'])->name('transaction.create');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
