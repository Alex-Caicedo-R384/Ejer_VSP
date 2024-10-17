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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ClienteID')->constrained('clientes'); // Establece la relación con clientes
            $table->string('Nombre'); // Agrega el campo Nombre
            $table->decimal('Monto', 10, 2); // Agrega el campo Monto
            $table->date('Fecha'); // Agrega el campo Fecha
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
