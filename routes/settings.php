<?php

use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::redirect('configuracao', '/configuracao/perfil');

    Route::get('configuracao/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('configuracao/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('configuracao/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('configuracao/senha', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('configuracao/senha', [PasswordController::class, 'update'])->name('password.update');
});
