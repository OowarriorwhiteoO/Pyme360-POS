<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importamos el modelo Producto
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Función para mostrar la lista de productos
    public function index(Request $request)
    {
        // Capturar lo que el usuario escribió en el buscador
        $busqueda = $request->input('buscar');

        // Si hay búsqueda, filtrar. Si no, traer todos.
        // Paginamos de 10 en 10 para que la página no sea eterna.
        $products = Product::query()
            ->when($busqueda, function ($query, $busqueda) {
                return $query->where('name', 'like', "%{$busqueda}%")
                    ->orWhere('sku', 'like', "%{$busqueda}%");
            })
            ->paginate(10); // Muestra 10 por página

        return view('products.index', compact('products'));
    }

    // Función para guardar un nuevo producto (La usaremos pronto)
    public function store(Request $request)
    {
        // Validar y guardar (lo llenaremos después)
    }
}
