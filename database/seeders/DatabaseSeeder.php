<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario admin
        User::firstOrCreate(
            ['email' => 'admin@tornillodorado.cl'],
            [
                'name' => 'Administrador Tornillo Dorado',
                'password' => Hash::make('dorado2508'),
            ]
        );

        echo "✅ Usuario admin creado: admin@tornillodorado.cl\n";

        // Crear productos de ferretería (sin Faker)
        $productos = [
            // Martillos
            ['sku' => 'MAR-0001', 'name' => 'Martillo Stanley Profesional', 'price_cost' => 8500, 'price_sale' => 12000, 'stock' => 25],
            ['sku' => 'MAR-0002', 'name' => 'Martillo Truper Premium', 'price_cost' => 7200, 'price_sale' => 10000, 'stock' => 30],
            ['sku' => 'MAR-0003', 'name' => 'Martillo Makita Hogar', 'price_cost' => 6800, 'price_sale' => 9500, 'stock' => 20],

            // Destornilladores
            ['sku' => 'DES-0001', 'name' => 'Destornillador Stanley Plano', 'price_cost' => 2500, 'price_sale' => 3500, 'stock' => 50],
            ['sku' => 'DES-0002', 'name' => 'Destornillador Phillips Truper', 'price_cost' => 2800, 'price_sale' => 4000, 'stock' => 45],
            ['sku' => 'DES-0003', 'name' => 'Set Destornilladores Bosch 6 Piezas', 'price_cost' => 12000, 'price_sale' => 17000, 'stock' => 15],

            // Llaves
            ['sku' => 'LLA-0001', 'name' => 'Llave Inglesa 12 pulgadas', 'price_cost' => 9500, 'price_sale' => 13500, 'stock' => 18],
            ['sku' => 'LLA-0002', 'name' => 'Set Llaves Allen Métricas', 'price_cost' => 5500, 'price_sale' => 7800, 'stock' => 22],
            ['sku' => 'LLA-0003', 'name' => 'Llave Francesa Ajustable 10"', 'price_cost' => 8200, 'price_sale' => 11500, 'stock' => 16],

            // Taladros
            ['sku' => 'TAL-0001', 'name' => 'Taladro Percutor Bosch 13mm', 'price_cost' => 45000, 'price_sale' => 63000, 'stock' => 8],
            ['sku' => 'TAL-0002', 'name' => 'Taladro Inalámbrico Black+Decker', 'price_cost' => 38000, 'price_sale' => 53000, 'stock' => 12],
            ['sku' => 'TAL-0003', 'name' => 'Taladro Manual Stanley', 'price_cost' => 15000, 'price_sale' => 21000, 'stock' => 10],

            // Sierras
            ['sku' => 'SIE-0001', 'name' => 'Sierra Caladora Makita 400W', 'price_cost' => 42000, 'price_sale' => 59000, 'stock' => 6],
            ['sku' => 'SIE-0002', 'name' => 'Sierra de Mano Para Madera', 'price_cost' => 6500, 'price_sale' => 9000, 'stock' => 28],
            ['sku' => 'SIE-0003', 'name' => 'Sierra Circular 7 1/4 pulgadas', 'price_cost' => 55000, 'price_sale' => 77000, 'stock' => 5],

            // Clavos y Tornillos
            ['sku' => 'TOR-0001', 'name' => 'Tornillos Madera 2" x 100 unidades', 'price_cost' => 1500, 'price_sale' => 2100, 'stock' => 100],
            ['sku' => 'TOR-0002', 'name' => 'Tornillos Yeso 1.5" x 200 unidades', 'price_cost' => 2200, 'price_sale' => 3100, 'stock' => 85],
            ['sku' => 'CLA-0001', 'name' => 'Clavos Acero 3" x 500g', 'price_cost' => 2800, 'price_sale' => 3900, 'stock' => 60],
            ['sku' => 'CLA-0002', 'name' => 'Clavos Para Concreto x 100 unidades', 'price_cost' => 3500, 'price_sale' => 4900, 'stock' => 42],

            // Brocas
            ['sku' => 'BRO-0001', 'name' => 'Set Brocas Metal 13 Piezas', 'price_cost' => 8500, 'price_sale' => 12000, 'stock' => 20],
            ['sku' => 'BRO-0002', 'name' => 'Broca Concreto 8mm', 'price_cost' => 1800, 'price_sale' => 2500, 'stock' => 55],
            ['sku' => 'BRO-0003', 'name' => 'Broca Madera 12mm', 'price_cost' => 1500, 'price_sale' => 2100, 'stock' => 48],

            // Cintas y Adhesivos
            ['sku' => 'CIN-0001', 'name' => 'Cinta Métrica 5 metros Stanley', 'price_cost' => 5500, 'price_sale' => 7700, 'stock' => 35],
            ['sku' => 'CIN-0002', 'name' => 'Cinta Aislante Negra 3M', 'price_cost' => 1200, 'price_sale' => 1700, 'stock' => 75],
            ['sku' => 'CIN-0003', 'name' => 'Cinta Masking Tape 2 pulgadas', 'price_cost' => 1800, 'price_sale' => 2500, 'stock' => 62],

            // Pinturas y Brochas
            ['sku' => 'PIN-0001', 'name' => 'Pintura Látex Blanco 1 Galón', 'price_cost' => 12000, 'price_sale' => 17000, 'stock' => 14],
            ['sku' => 'PIN-0002', 'name' => 'Brocha 3 pulgadas Profesional', 'price_cost' => 3500, 'price_sale' => 4900, 'stock' => 28],
            ['sku' => 'PIN-0003', 'name' => 'Rodillo Para Pintura + Bandeja', 'price_cost' => 4200, 'price_sale' => 5900, 'stock' => 22],

            // Candados y Cerraduras
            ['sku' => 'CAN-0001', 'name' => 'Candado Yale 40mm', 'price_cost' => 6500, 'price_sale' => 9100, 'stock' => 18],
            ['sku' => 'CAN-0002', 'name' => 'Cerradura Puerta Entrada', 'price_cost' => 15000, 'price_sale' => 21000, 'stock' => 12],
            ['sku' => 'CAN-0003', 'name' => 'Candado Combinación 50mm', 'price_cost' => 7800, 'price_sale' => 11000, 'stock' => 15],
        ];

        foreach ($productos as $prod) {
            Product::firstOrCreate(
                ['sku' => $prod['sku']],
                [
                    'name' => $prod['name'],
                    'description' => 'Producto de ferretería de alta calidad.',
                    'price_cost' => $prod['price_cost'],
                    'price_sale' => $prod['price_sale'],
                    'stock' => $prod['stock'],
                    'stock_min' => 5,
                    'category' => 'Herramientas',
                ]
            );
        }

        echo "✅ " . count($productos) . " productos creados\n";
    }
}
