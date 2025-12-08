<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Eliminar el usuario si ya existe para evitar duplicados
        User::where('email', 'admin@tornillodorado.cl')->delete();

        // Crear el usuario administrador
        User::create([
            'name' => 'Administrador Tornillo Dorado',
            'email' => 'admin@tornillodorado.cl',
            'password' => Hash::make('dorado2508'),
            'email_verified_at' => now(),
        ]);

        echo "✅ Usuario administrador creado exitosamente\n";
        echo "   Email: admin@tornillodorado.cl\n";
        echo "   Contraseña: dorado2508\n";
    }
}
