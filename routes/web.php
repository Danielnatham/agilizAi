<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {return redirect()->route('login');})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('painel', function () { return Inertia::render('home');})->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('usuarios', [\App\Http\Controllers\ManageUserController::class, 'index'])->name('usuarios.index');
        Route::get('usuarios/novo', [\App\Http\Controllers\ManageUserController::class, 'create'])->name('usuarios.create');
        Route::post('usuarios', [\App\Http\Controllers\ManageUserController::class, 'store'])->name('usuarios.store');
        Route::get('usuarios/{user}/editar', [\App\Http\Controllers\ManageUserController::class, 'edit'])->name('usuarios.edit');
        Route::put('usuarios/{user}', [\App\Http\Controllers\ManageUserController::class, 'update'])->name('usuarios.update');
        Route::delete('usuarios/{user}', [\App\Http\Controllers\ManageUserController::class, 'destroy'])->name('usuarios.destroy');
    });

    Route::prefix('gerencia')->name('gerencia.')->group(function () {
        Route::get('painel', function () { return Inertia::render('admin/dashboard');})->name('admin-dashboard');
        Route::get('solicitacoes', [\App\Http\Controllers\RequestController::class, 'index'])->name('solicitacoes.index');
        Route::get('solicitacoes/{request}/detalhes', [\App\Http\Controllers\RequestController::class, 'show'])->name('solicitacoes.show');
        Route::get('solicitacoes/novo', [\App\Http\Controllers\RequestController::class, 'create'])->name('solicitacoes.create');
        Route::post('solicitacoes', [\App\Http\Controllers\RequestController::class, 'store'])->name('solicitacoes.store');
        Route::get('solicitacoes/{request}/editar', [\App\Http\Controllers\RequestController::class, 'edit'])->name('solicitacoes.edit');
        Route::put('solicitacoes/{request}', [\App\Http\Controllers\RequestController::class, 'update'])->name('solicitacoes.update');
    });
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
