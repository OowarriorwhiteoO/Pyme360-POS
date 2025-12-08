@extends('layouts.app')

@section('title', 'Inventario - Pyme360')

@section('content')
    <div class="container mx-auto px-4 py-8">

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <h1 class="text-3xl font-bold text-gray-800">📦 Inventario Ferretería</h1>

            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2 w-full md:w-1/2">
                <input type="text" name="buscar" placeholder="Buscar por nombre o código..."
                    class="w-full px-4 py-2 rounded shadow border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('buscar') }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    Buscar
                </button>
            </form>

            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow whitespace-nowrap">
                + Nuevo
            </button>
        </div>

        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            SKU</th>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Producto</th>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Precio</th>
                        <th
                            class="px-5 py-3 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 border-b border-gray-200 text-sm font-mono text-gray-600">
                                {{ $product->sku }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 text-sm font-bold text-gray-800">
                                {{ $product->name }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 text-sm text-green-600 font-bold">$
                                {{ number_format($product->price_sale, 0, ',', '.') }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                @if ($product->stock < 5)
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-bold">Crítico:
                                        {{ $product->stock }}</span>
                                @else
                                    <span
                                        class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold">{{ $product->stock }}
                                        un.</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4 bg-white border-t border-gray-200">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
