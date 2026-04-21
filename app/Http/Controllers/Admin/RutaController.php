<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    public function index()
    {
        $rutas = Ruta::all();
        return view('admin.rutas.index', compact('rutas'));
    }

    public function create()
    {
        return view('admin.rutas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'duracion' => 'required',
            'dificultad' => 'required',
            'precio' => 'required|numeric',
        ]);

        Ruta::create($request->all());

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta creada correctamente.');
    }

    public function show(Ruta $ruta)
    {
        return view('admin.rutas.show', compact('ruta'));
    }

    public function edit(Ruta $ruta)
    {
        return view('admin.rutas.edit', compact('ruta'));
    }

    public function update(Request $request, Ruta $ruta)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'duracion' => 'required',
            'dificultad' => 'required',
            'precio' => 'required|numeric',
        ]);

        $ruta->update($request->all());

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta actualizada correctamente.');
    }

    public function destroy(Ruta $ruta)
    {
        $ruta->delete();

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta eliminada correctamente.');
    }
}
