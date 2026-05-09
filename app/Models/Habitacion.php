<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';

    // Agregamos los nuevos campos al arreglo
    protected $fillable = [
        'numero', 
        'tipo_habitacion_id', 
        'estado',
        'nombre',
        'tipo',
        'descripcion',
        'precio',
        'imagen_url'
    ];
}