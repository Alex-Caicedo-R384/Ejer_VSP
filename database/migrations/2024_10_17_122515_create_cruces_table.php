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
        Schema::create('cruces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ClienteID')->constrained('clientes'); // Relación con clientes
            $table->decimal('SumaMontos', 10, 2)->nullable(); // Campo para la suma de montos
            $table->string('Nombre'); // Campo para el nombre del cliente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cruces');
    }
};
