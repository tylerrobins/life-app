<?php

use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;

/**Route::get('finance/test', function () {
 *  $user = Auth::user();
 *  $transactions = $user->home->transactions;
 *  return Inertia::render('FinanceTest', ['transactions' => $transactions]);
 *})->middleware(['auth', 'verified'])->name('financeTest');
 */

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('finance', [FinanceController::class, 'view'])->name('finance');
    Route::get('finance/test', [FinanceController::class, 'test'])->name('financeTest');
});
