<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repartidor extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'telefono',
        'correo',
        'numero_licencia',
        'imagen',
    ];

    public function vehiculos()
    {
    return $this->hasMany(Vehiculo::class, 'repartidor_id');
    }
}
