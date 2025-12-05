<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ventas de Hoy
        $salesToday = Sale::whereDate('created_at', Carbon::today());
        $moneyToday = $salesToday->sum('total'); // Dinero en caja hoy
        $countToday = $salesToday->count();      // Cantidad de ventas hoy

        // 2. Productos Críticos (Stock bajo)
        $criticalProducts = Product::where('stock', '<', 5)->take(5)->get();
        $totalCritical = Product::where('stock', '<', 5)->count();

        // 3. Producto Más Vendido (Un poco de magia SQL)
        // Esto es opcional, si da error lo quitamos, pero se ve genial.
        $totalProducts = Product::count();

        return view('dashboard', compact('moneyToday', 'countToday', 'criticalProducts', 'totalCritical', 'totalProducts'));
    }
}
