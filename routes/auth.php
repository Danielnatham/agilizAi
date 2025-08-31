<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('registrar', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('registrar', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('esqueceu-senha', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('esqueceu-senha', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reniciar-senha/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reniciar-senha', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
