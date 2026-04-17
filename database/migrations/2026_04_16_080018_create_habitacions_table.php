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
    Schema::create('habitacions', function (Blueprint $table) {
        $table->id();
        $table->string('nombre'); // Ej: Suite Presidencial
        $table->string('tipo'); // Ej: Sencilla, Doble, Suite
        $table->text('descripcion')->nullable(); // Texto largo para describir el cuarto
        $table->decimal('precio', 8, 2); // Hasta 8 dígitos, con 2 decimales (Ej: 1500.50)
        $table->string('imagen_url')->nullable(); // Para guardar la ruta de la foto
        $table->boolean('disponible')->default(true); // ¿Está libre u ocupada?
        $table->timestamps(); // Guarda la fecha de creación y actualización automáticamente
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacions');
    }
};
