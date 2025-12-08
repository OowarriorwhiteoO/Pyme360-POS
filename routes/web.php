<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rutas de Autenticación (Públicas)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas Protegidas (Requieren Autenticación)
Route::middleware('auth')->group(function () {

    // Dashboard (Ruta Principal)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // MÓDULO 1: INVENTARIO
    Route::get('/productos', [ProductController::class, 'index'])->name('products.index');

    // MÓDULO 2: PUNTO DE VENTA (POS)
    Route::get('/vender', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/vender', [SaleController::class, 'store'])->name('sales.store');
});
