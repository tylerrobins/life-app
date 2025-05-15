<?php

use App\Http\Controllers\Finance\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('finance', [TransactionController::class, 'dashboard'])->name('finance.dashboard');
    Route::get('finance/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('finance/transactions/add', [TransactionController::class, 'create'])->name('transaction.create');
    Route::get('finance/budget', []);
});
