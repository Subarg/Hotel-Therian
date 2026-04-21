<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\TipoHabitacion; // Importante importar esto

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Extraemos TODAS las habitaciones de la base de datos
        $habitaciones = Habitacion::all();

        // 2. Se las pasamos a la vista usando la función compact()
        return view('admin.habitaciones.index', compact('habitaciones'));
    }
public function create()
    {
        return view('admin.habitaciones.create');
    }

    public function store(Request $request)
    {
        // 1. Validamos los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'imagen_url' => 'nullable|url',
        ]);

        // 2. Guardamos en PostgreSQL
        Habitacion::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen_url' => $request->imagen_url,
            'disponible' => true,
        ]);

        // 3. Regresamos a la tabla
        return redirect()->route('habitaciones.index');
    }

    public function edit($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return view('admin.habitaciones.edit', compact('habitacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'imagen_url' => 'nullable|url',
        ]);

        $habitacion = Habitacion::findOrFail($id);
        $habitacion->update([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen_url' => $request->imagen_url,
            'disponible' => $request->has('disponible') ? true : false,
        ]);

        return redirect()->route('habitaciones.index')->with('success', 'Habitación actualizada correctamente.');
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();

        return redirect()->route('habitaciones.index')->with('success', 'Habitación eliminada correctamente.');
    }
}