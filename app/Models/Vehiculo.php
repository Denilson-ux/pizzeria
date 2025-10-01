<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'marca',
        'modelo',
        'placa',
        'tipo_vehiculo_id',
        'repartidor_id',
    ];

    // Relación con TipoVehiculo (muchos vehiculos pertenecen a un tipo)
    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class, 'tipo_vehiculo_id');
    }

    // Relación con Repartidor (muchos vehiculos pertenecen a un repartidor)
    public function repartidor()
    {
        return $this->belongsTo(Repartidor::class, 'repartidor_id');
    }
}
