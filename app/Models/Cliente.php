<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    //
    protected $fillable = [
        'ci',
        'nombre',
        'paterno',
        'materno',
        'telefono',
        'correo',
    ];
}
