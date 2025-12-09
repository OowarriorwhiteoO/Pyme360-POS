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

        echo "✅ Usuario admin creado\n";

        // Definir categorías y productos base
        $categorias = [
            'Herramientas Manuales' => [
                ['Martillo', 5000, 15000],
                ['Destornillador', 2000, 6000],
                ['Llave', 3000, 10000],
                ['Alicate', 4000, 12000],
                ['Cincel', 2500, 7000],
                ['Espátula', 1500, 4500],
                ['Nivel', 6000, 18000],
                ['Serrucho', 5500, 16000],
                ['Lima', 2000, 6000],
                ['Tenaza', 4500, 13000],
            ],
            'Herramientas Eléctricas' => [
                ['Taladro', 30000, 90000],
                ['Amoladora', 35000, 105000],
                ['Sierra Circular', 40000, 120000],
                ['Sierra Caladora', 32000, 96000],
                ['Lijadora', 28000, 84000],
                ['Rotomartillo', 50000, 150000],
                ['Esmeril', 25000, 75000],
                ['Atornillador Eléctrico', 22000, 66000],
                ['Pistola de Calor', 18000, 54000],
                ['Compresor', 60000, 180000],
            ],
            'Fijaciones' => [
                ['Tornillos Madera', 800, 2400],
                ['Tornillos Metal', 1000, 3000],
                ['Tornillos Yeso', 700, 2100],
                ['Clavos Acero', 600, 1800],
                ['Clavos Cemento', 1200, 3600],
                ['Pernos', 1500, 4500],
                ['Tuercas', 500, 1500],
                ['Arandelas', 300, 900],
                ['Remaches', 1000, 3000],
                ['Tarugos', 400, 1200],
            ],
            'Pinturas y Accesorios' => [
                ['Pintura Látex', 10000, 30000],
                ['Pintura Esmalte', 12000, 36000],
                ['Barniz', 8000, 24000],
                ['Thinner', 3000, 9000],
                ['Brocha', 2000, 6000],
                ['Rodillo', 3500, 10500],
                ['Bandeja Para Pintura', 1500, 4500],
                ['Lija', 500, 1500],
                ['Masilla', 2500, 7500],
                ['Sellador', 6000, 18000],
            ],
            'Plomería' => [
                ['Llave Paso', 3000, 9000],
                ['Tubo PVC', 2000, 6000],
                ['Codo PVC', 500, 1500],
                ['T PVC', 700, 2100],
                ['Sifón', 4000, 12000],
                ['Manguera', 2500, 7500],
                ['Abrazadera', 600, 1800],
                ['Teflón', 300, 900],
                ['Soldadura PVC', 2000, 6000],
                ['Válvula', 5000, 15000],
            ],
            'Electricidad' => [
                ['Cable Eléctrico', 1500, 4500],
                ['Enchufe', 1000, 3000],
                ['Interruptor', 1200, 3600],
                ['Ampolleta LED', 3000, 9000],
                ['Tubo Fluorescente', 4000, 12000],
                ['Caja Derivación', 800, 2400],
                ['Cinta Aislante', 1000, 3000],
                ['Fusible', 500, 1500],
                ['Tomacorriente', 2000, 6000],
                ['Timer Eléctrico', 6000, 18000],
            ],
            'Seguridad' => [
                ['Candado', 5000, 15000],
                ['Cerradura', 8000, 24000],
                ['Cadena', 4000, 12000],
                ['Chapa', 6000, 18000],
                ['Manilla', 3000, 9000],
                ['Bisagra', 1500, 4500],
                ['Cerrojo', 2500, 7500],
                ['Picaporte', 2000, 6000],
                ['Aldaba', 3500, 10500],
                ['Mirilla', 1800, 5400],
            ],
            'Medición' => [
                ['Cinta Métrica', 3000, 9000],
                ['Nivel Láser', 25000, 75000],
                ['Nivel Burbuja', 4000, 12000],
                ['Escuadra', 2500, 7500],
                ['Calibrador', 8000, 24000],
                ['Huincha', 2000, 6000],
                ['Plomada', 1500, 4500],
                ['Goniómetro', 6000, 18000],
                ['Transportador', 1000, 3000],
                ['Compás', 2500, 7500],
            ],
            'Adhesivos' => [
                ['Silicona', 2000, 6000],
                ['Cola Fría', 1500, 4500],
                ['Pegamento', 1000, 3000],
                ['Cemento Contacto', 3000, 9000],
                ['Adhesivo Montaje', 3500, 10500],
                ['Cinta Doble Faz', 1200, 3600],
                ['Superbonder', 2500, 7500],
                ['Masking Tape', 800, 2400],
                ['Cinta Scotch', 600, 1800],
                ['Cinta Duct Tape', 2000, 6000],
            ],
            'Jardinería' => [
                ['Pala', 6000, 18000],
                ['Rastrillo', 5000, 15000],
                ['Tijera Podar', 7000, 21000],
                ['Manguera Jardín', 8000, 24000],
                ['Regadera', 3000, 9000],
                ['Guantes Jardín', 2000, 6000],
                ['Semillas', 1000, 3000],
                ['Fertilizante', 4000, 12000],
                ['Maceta', 2500, 7500],
                ['Tierra Abono', 3000, 9000],
            ],
        ];

        $marcas = ['Stanley', 'Truper', 'Bosch', 'Makita', 'Black+Decker', 'DeWalt', 'Bellota', 'Bremen', 'Urrea', 'Silverline'];
        $tipos = ['Profesional', 'Premium', 'Hogar', 'Industrial', 'Compacto', 'Reforzado', 'Standard', 'Plus', 'Pro', 'Max'];

        $count = 0;
        $sku_counter = 1;

        foreach ($categorias as $categoria => $productos_base) {
            foreach ($productos_base as $producto_info) {
                $nombre_base = $producto_info[0];
                $costo_min = $producto_info[1];
                $costo_max = $producto_info[2];

                // Crear 3 variantes de cada producto base
                for ($i = 0; $i < 3; $i++) {
                    $marca = $marcas[array_rand($marcas)];
                    $tipo = $tipos[array_rand($tipos)];

                    $costo = rand($costo_min, $costo_max);
                    $venta = (int)($costo * 1.4); // 40% ganancia

                    $sku = strtoupper(substr($nombre_base, 0, 3)) . '-' . str_pad($sku_counter, 4, '0', STR_PAD_LEFT);

                    Product::firstOrCreate(
                        ['sku' => $sku],
                        [
                            'name' => "$nombre_base $marca $tipo",
                            'description' => "Producto de ferretería de alta calidad categoria $categoria",
                            'price_cost' => $costo,
                            'price_sale' => $venta,
                            'stock' => rand(5, 100),
                            'stock_min' => 5,
                            'category' => $categoria,
                        ]
                    );

                    $sku_counter++;
                    $count++;

                    // Detener al llegar a 300
                    if ($count >= 300) {
                        break 3;
                    }
                }
            }
        }

        echo "✅ $count productos creados\n";
    }
}
