<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('companies', CompanyController::class)->middleware(['auth']);

require __DIR__.'/auth.php';

