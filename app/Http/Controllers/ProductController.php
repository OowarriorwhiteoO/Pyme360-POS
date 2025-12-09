<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Controlador de Productos
 * 
 * Gestiona el inventario de productos de la ferretería.
 * Permite listar, buscar y crear nuevos productos.
 */
class ProductController extends Controller
{
    /**
     * Mostrar lista de productos con búsqueda y paginación
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Capturar término de búsqueda del usuario
        $busqueda = $request->input('buscar');

        // Construir query con búsqueda opcional y paginación
        $products = Product::query()
            ->when($busqueda, function ($query, $busqueda) {
                // Buscar por nombre o SKU si hay término de búsqueda
                return $query->where('name', 'like', "%{$busqueda}%")
                    ->orWhere('sku', 'like', "%{$busqueda}%");
            })
            ->paginate(10); // Mostrar 10 productos por página

        return view('products.index', compact('products'));
    }

    /**
     * Guardar un nuevo producto en la base de datos
     * 
     * Valida los datos recibidos y crea un nuevo registro de producto.
     * Retorna respuesta JSON para uso con fetch desde Alpine.js
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos recibidos
            $validated = $request->validate([
                'sku' => 'required|string|unique:products,sku|max:50',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price_cost' => 'required|numeric|min:0',
                'price_sale' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'stock_min' => 'required|integer|min:0',
                'category' => 'required|string|max:100'
            ]);

            // Crear el producto en la base de datos
            $product = Product::create($validated);

            // Retornar respuesta exitosa
            return response()->json([
                'success' => true,
                'message' => 'Producto creado correctamente',
                'product' => $product
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Error de validación - retornar detalles
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos: ' . implode(', ', $e->errors()[array_key_first($e->errors())])
            ], 422);
        } catch (\Exception $e) {
            // Error genérico
            return response()->json([
                'success' => false,
                'message' => 'Error al crear producto: ' . $e->getMessage()
            ], 500);
        }
    }
}
