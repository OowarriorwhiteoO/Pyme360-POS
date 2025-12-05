<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Necesario para transacciones

class SaleController extends Controller
{
    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        // 1. Validar que vengan datos
        $data = $request->validate([
            'cart' => 'required|array|min:1', // El carrito debe ser un array y tener al menos 1 producto
        ]);

        try {
            // Usamos una "Transacción": O se guarda TODO o no se guarda NADA.
            // Esto evita que se descuente stock si la venta falla a la mitad.
            DB::beginTransaction();

            // 2. Crear la Cabecera de la Venta
            $sale = Sale::create([
                'total' => 0, // Lo calcularemos abajo para mayor seguridad
                'items_count' => count($data['cart']),
                'payment_type' => 'Efectivo',
                'status' => 'Completada'
            ]);

            $totalCalculado = 0;

            // 3. Recorrer el carrito y guardar los detalles
            foreach ($data['cart'] as $item) {
                $product = Product::find($item['id']);

                // Verificar stock una última vez
                if ($product->stock < $item['qty']) {
                    throw new \Exception("Stock insuficiente para: " . $product->name);
                }

                // Descontar Stock
                $product->decrement('stock', $item['qty']);

                // Guardar Detalle
                SaleDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $item['qty'],
                    'price' => $product->price_sale,
                    'subtotal' => $product->price_sale * $item['qty']
                ]);

                $totalCalculado += ($product->price_sale * $item['qty']);
            }

            // 4. Actualizar el total real en la venta
            $sale->update(['total' => $totalCalculado]);

            DB::commit(); // Confirmar cambios en la BD

            return response()->json(['success' => true, 'message' => 'Venta guardada correctamente']);
        } catch (\Exception $e) {
            DB::rollBack(); // Deshacer cambios si algo falló
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
