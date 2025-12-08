@extends('layouts.app')

@section('title', 'Dashboard - Pyme360')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <h2 class="text-2xl font-bold text-gray-700 mb-6">📊 Resumen del Día: {{ date('d-m-Y') }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        💰
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase">Ventas Hoy (Caja)</p>
                        <p class="text-3xl font-bold text-gray-800">$ {{ number_format($moneyToday, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                        🧾
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase">Transacciones</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $countToday }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                        ⚠️
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase">Stock Crítico</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalCritical }} productos</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">⚡ Accesos Rápidos</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('sales.create') }}"
                        class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition text-center group">
                        <div class="text-3xl mb-2 group-hover:scale-110 transition">🛒</div>
                        <span class="font-bold text-green-800">Nueva Venta</span>
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition text-center group">
                        <div class="text-3xl mb-2 group-hover:scale-110 transition">📦</div>
                        <span class="font-bold text-blue-800">Ver Inventario</span>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-red-700 mb-4">🚨 Alerta: Reponer Stock</h3>
                @if ($criticalProducts->isEmpty())
                    <p class="text-green-600">¡Todo en orden! No hay stock crítico.</p>
                @else
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="text-sm font-semibold text-gray-600 p-2 border-b">Producto</th>
                                <th class="text-sm font-semibold text-gray-600 p-2 border-b">Stock Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criticalProducts as $product)
                                <tr>
                                    <td class="p-2 border-b text-sm text-gray-800">{{ $product->name }}</td>
                                    <td class="p-2 border-b text-sm font-bold text-red-600">{{ $product->stock }} un.</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 text-right">
                        <a href="{{ route('products.index') }}" class="text-sm text-blue-600 hover:underline">Ver todos
                            &rarr;</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
