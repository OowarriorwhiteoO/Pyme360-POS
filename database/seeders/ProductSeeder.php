<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Lista de datos reales para combinar
        $nombres = ['Martillo', 'Serrucho', 'Alicate', 'Destornillador', 'Llave Inglesa', 'Taladro', 'Brocha', 'Rodillo', 'Lija', 'Cinta Métrica'];
        $marcas = ['Stanley', 'Bauker', 'Ubermann', 'Redline', 'Black&Decker', 'Makita', 'Truper'];
        $tipos = ['Profesional', 'Hogar', 'Industrial', 'Básico', 'Premium'];

        $productos = [];

        for ($i = 1; $i <= 500; $i++) {
            // Elegir al azar
            $nombre = $nombres[array_rand($nombres)];
            $marca = $marcas[array_rand($marcas)];
            $tipo = $tipos[array_rand($tipos)];

            // Precio costo entre 1.000 y 20.000
            $costo = rand(10, 200) * 100;
            // Precio venta = Costo + 40% ganancia (redondeado)
            $venta = (int) ($costo * 1.4);

            $productos[] = [
                'sku' => strtoupper(substr($nombre, 0, 3)) . '-' . str_pad($i, 4, '0', STR_PAD_LEFT), // Ej: MAR-0001
                'name' => "$nombre $marca $tipo", // Ej: Martillo Stanley Profesional
                'description' => "Herramienta de calidad $tipo para trabajos de ferretería.",
                'price_cost' => $costo,
                'price_sale' => $venta,
                'stock' => rand(0, 100), // Stock aleatorio entre 0 y 100
                'stock_min' => 5,
                'category' => 'Herramientas', // Por ahora todos en herramientas para simplificar
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar los 500 productos de una vez
        DB::table('products')->insert($productos);
    }
}
