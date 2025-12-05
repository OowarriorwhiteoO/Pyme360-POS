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
        // Tabla para la Cabecera de la Venta (El Ticket)
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('total'); // Total a pagar
            $table->integer('items_count'); // Cantidad de productos distintos
            $table->string('payment_type')->default('Efectivo'); // Efectivo, Débito, Crédito
            $table->string('status')->default('Completada'); // Completada, Anulada
            $table->timestamps(); // Fecha y hora de la venta
        });

        // Tabla para el Detalle (Qué productos compró)
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();

            // Relación con la venta (Si borro la venta, se borran sus detalles)
            $table->foreignId('sale_id')->constrained()->onDelete('cascade');

            // Relación con el producto
            $table->foreignId('product_id')->constrained();

            $table->string('product_name'); // Guardamos el nombre por si después cambia
            $table->integer('quantity'); // Cantidad llevada
            $table->integer('price'); // Precio al momento de la venta
            $table->integer('subtotal'); // cantidad * precio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_tables');
    }
};
