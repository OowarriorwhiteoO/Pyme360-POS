<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    // Permitir guardar estos datos masivamente
    protected $fillable = ['total', 'items_count', 'payment_type', 'status'];

    // Una Venta tiene muchos Detalles
    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
