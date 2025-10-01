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
        Schema::create('vehiculos', function (Blueprint $table) {
        $table->id(); // idVehiculo
        $table->string('color');
        $table->string('marca');
        $table->string('modelo');
        $table->string('placa')->unique();

        // Relaciones
        $table->unsignedBigInteger('tipo_vehiculo_id'); 
        $table->unsignedBigInteger('repartidor_id');

        // Claves foráneas
        $table->foreign('tipo_vehiculo_id')->references('id')->on('tipo_vehiculos')->onDelete('cascade');
        $table->foreign('repartidor_id')->references('id')->on('repartidors')->onDelete('cascade');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
