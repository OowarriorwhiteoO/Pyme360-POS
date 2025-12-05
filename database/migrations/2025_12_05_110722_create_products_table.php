<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Identificador único (1, 2, 3...)
            $table->string('sku')->unique(); // Código de barra o interno
            $table->string('name'); // Nombre (Ej: Martillo)
            $table->text('description')->nullable(); // Descripción opcional
            $table->integer('price_cost'); // Precio Costo (sin decimales, en pesos)
            $table->integer('price_sale'); // Precio Venta
            $table->integer('stock')->default(0); // Cantidad actual
            $table->integer('stock_min')->default(5); // Alerta de stock crítico
            $table->string('category')->nullable(); // Categoría (Ej: Herramientas)
            $table->timestamps(); // Guarda fecha de creación y modificación
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
