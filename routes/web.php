<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('finance', function () {
    return Inertia::render('Finance');
})->middleware(['auth', 'verified'])->name('finance');

Route::get('finance/test', function () {
    return Inertia::render('FinanceTest');
})->middleware(['auth', 'verified'])->name('financeTest');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
