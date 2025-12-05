<?php

use Illuminate\Support\Facades\Route;
// IMPORTANTE: Estas líneas traen tus controladores para que Laravel los encuentre
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta Principal (Dashboard)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// --- MÓDULO 1: INVENTARIO ---
// Muestra la lista de productos y el buscador
Route::get('/productos', [ProductController::class, 'index'])->name('products.index');

// --- MÓDULO 2: PUNTO DE VENTA (POS) ---
// 1. Mostrar la pantalla de ventas (Caja)
Route::get('/vender', [SaleController::class, 'create'])->name('sales.create');

// 2. Guardar la venta y descontar stock (Cuando aprietas el botón verde)
Route::post('/vender', [SaleController::class, 'store'])->name('sales.store');
