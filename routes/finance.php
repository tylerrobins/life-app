<?php

use App\Http\Controllers\Finance\BudgetController;
use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\Finance\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('finance', [FinanceController::class, 'index'])->name('finance.index');

    Route::get('finance/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('finance/transactions/add', [TransactionController::class, 'create'])->name('transaction.create');

    Route::get('finance/budget', [BudgetController::class, 'index'])->name('budget.index');
    Route::get('finance/budget/add', [BudgetController::class, 'create'])->name('budget.create');
});
