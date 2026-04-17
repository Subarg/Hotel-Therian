<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    // Apuntamos a la tabla de tu compañero
    protected $table = 'insumos';

    // Los campos que se pueden llenar desde un formulario
    protected $fillable = [
        'nombre', 
        'precio', 
        'descripcion', 
        'categoria', 
        'stock'
    ];
}