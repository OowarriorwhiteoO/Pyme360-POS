<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Controlador de Ventas
 * 
 * Gestiona el punto de venta (POS) del sistema.
 * Permite visualizar productos disponibles y procesar ventas.
 */
class SaleController extends Controller
{
    /**
     * Mostrar el punto de venta
     * 
     * Carga todos los productos que tienen stock disponible
     * y los envía a la vista del POS para que el usuario
     * pueda agregarlos al carrito de compras.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Obtener solo productos con stock mayor a 0
        $products = Product::where('stock', '>', 0)->get();

        // Retornar vista con los productos disponibles
        return view('sales.create', compact('products'));
    }

    /**
     * Procesar y guardar una nueva venta
     * 
     * Este método realiza el proceso completo de registro de venta:
     * 1. Valida los datos recibidos
     * 2. Crea el registro de venta (cabecera)
     * 3. Descuenta el stock de cada producto vendido
     * 4. Guarda los detalles de la venta
     * 5. Calcula y actualiza el total
     * 
     * Usa transacciones para garantizar integridad de datos:
     * Si algo falla, se deshacen todos los cambios.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validar que venga el carrito con al menos un producto
        $data = $request->validate([
            'cart' => 'required|array|min:1',
        ]);

        try {
            // Iniciar transacción de base de datos
            // Si algo falla, todos los cambios se revierten automáticamente
            DB::beginTransaction();

            // Crear el registro principal de la venta (cabecera)
            $sale = Sale::create([
                'total' => 0, // Se calculará después con los productos
                'items_count' => count($data['cart']),
                'payment_type' => 'Efectivo',
                'status' => 'Completada'
            ]);

            // Variable para acumular el total de la venta
            $totalCalculado = 0;

            // Procesar cada producto del carrito
            foreach ($data['cart'] as $item) {
                // Buscar el producto en la base de datos
                $product = Product::find($item['id']);

                // Verificar que haya stock suficiente antes de vender
                if ($product->stock < $item['qty']) {
                    // Si no hay stock, lanzar excepción para cancelar la venta
                    throw new \Exception("Stock insuficiente para: " . $product->name);
                }

                // Descontar la cantidad vendida del stock del producto
                $product->decrement('stock', $item['qty']);

                // Calcular el subtotal de esta línea de venta
                $subtotal = $product->price_sale * $item['qty'];

                // Guardar el detalle de venta (una línea por producto)
                SaleDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $item['qty'],
                    'price' => $product->price_sale,
                    'subtotal' => $subtotal
                ]);

                // Acumular al total general de la venta
                $totalCalculado += $subtotal;
            }

            // Actualizar el total en la cabecera de la venta
            $sale->update(['total' => $totalCalculado]);

            // Confirmar la transacción - todos los cambios se guardan
            DB::commit();

            // Retornar respuesta exitosa al frontend
            return response()->json([
                'success' => true,
                'message' => 'Venta guardada correctamente'
            ]);
        } catch (\Exception $e) {
            // Si hubo algún error, deshacer todos los cambios
            DB::rollBack();

            // Retornar error al frontend
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
