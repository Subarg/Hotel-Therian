<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class FrontController extends Controller
{
    public function buscarHabitaciones(Request $request)
    {
        $llegada = $request->llegada;
        $salida = $request->salida;
        $huespedes = $request->huespedes;

        // Traemos TODAS las habitaciones temporalmente para evitar el error de la columna
        $habitaciones = Habitacion::all();

        return view('cliente.habitaciones_resultados', compact('habitaciones', 'llegada', 'salida', 'huespedes'));
    }
}