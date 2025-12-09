<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de Producto
 * 
 * Representa un producto de la ferretería en el sistema.
 * Incluye información de precio, stock y categorización.
 */
class Product extends Model
{
    /**
     * Campos que pueden ser asignados masivamente
     * 
     * Estos campos son los que se permiten llenar al crear
     * o actualizar un producto usando create() o update()
     * 
     * @var array
     */
    protected $fillable = [
        'sku',          // Código único del producto (ej: MAR-0001)
        'name',         // Nombre descriptivo del producto
        'description',  // Descripción detallada
        'price_cost',   // Precio de costo (lo que nos costó comprarlo)
        'price_sale',   // Precio de venta (lo que cobramos al cliente)
        'stock',        // Cantidad actual en inventario
        'stock_min',    // Stock mínimo antes de alertar reposición
        'category'      // Categoría del producto (ej: Herramientas)
    ];
}
