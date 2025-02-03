<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/action', [AuthController::class, 'loginAction'])->name('action.login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/action', [AuthController::class, 'registerAction'])->name('action.register');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', TransactionController::class)->name('dashboard.home');
    Route::get('/dashboard/transactions', [TransactionController::class, 'transactions'])->name('transaction');
    Route::post('/transactions/create', [TransactionController::class, 'store'])->name('transaction.create');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
