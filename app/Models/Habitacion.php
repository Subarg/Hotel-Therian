<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitacions';

    // Agregamos los campos que el formulario enviará a la BD
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'precio',
        'imagen_url',
        'disponible',
    ];
}