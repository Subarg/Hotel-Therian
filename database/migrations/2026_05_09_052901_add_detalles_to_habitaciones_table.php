<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('habitaciones', function (Blueprint $table) {
            // Agregamos las columnas que quieres manejar directamente
            $table->string('nombre')->after('numero')->nullable();
            $table->string('tipo')->after('nombre')->nullable();
            $table->text('descripcion')->after('tipo')->nullable();
            $table->decimal('precio', 8, 2)->after('descripcion')->nullable();
            $table->string('imagen_url')->after('precio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('habitaciones', function (Blueprint $table) {
            // Si nos arrepentimos, esto borra las columnas
            $table->dropColumn(['nombre', 'tipo', 'descripcion', 'precio', 'imagen_url']);
        });
    }
};
