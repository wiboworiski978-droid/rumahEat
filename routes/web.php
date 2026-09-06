<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin'])
                ->name('dashboard');

            Route::resource('categories', CategoryController::class)
                ->except(['show']);
        });

    Route::middleware('role:dapur')
        ->prefix('dapur')
        ->name('dapur.')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'dapur'])
                ->name('dashboard');
        });

    Route::middleware('role:pemilik')
        ->prefix('pemilik')
        ->name('pemilik.')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'pemilik'])
                ->name('dashboard');
        });
});