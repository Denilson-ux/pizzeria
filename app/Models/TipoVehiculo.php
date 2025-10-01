<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoVehiculo extends Model
{
        use HasFactory;

    protected $table = 'tipo_vehiculos';

    // Solo los campos que quieres guardar
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    public function vehiculos()
    {
    return $this->hasMany(Vehiculo::class, 'tipo_vehiculo_id');
    }
}
