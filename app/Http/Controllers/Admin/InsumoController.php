<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insumo;

class InsumoController extends Controller
{
    public function index()
    {
        // Traemos solo los insumos que pertenecen al Spa
        $insumos = Insumo::where('categoria', 'Spa')->get();
        return view('admin.spa.index', compact('insumos'));
    }

    public function create()
    {
        return view('admin.spa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'precio'      => 'required|numeric',
            'descripcion' => 'nullable|string',
            'stock'       => 'required|integer',
        ]);

        Insumo::create([
            'nombre'      => $request->nombre,
            'precio'      => $request->precio,
            'descripcion' => $request->descripcion,
            'stock'       => $request->stock,
            'categoria'   => 'Spa', // Siempre 'Spa' para este CRUD
        ]);

        return redirect()->route('spa.index')->with('success', 'Insumo del Spa creado correctamente.');
    }

    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('admin.spa.edit', compact('insumo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'precio'      => 'required|numeric',
            'descripcion' => 'nullable|string',
            'stock'       => 'required|integer',
        ]);

        $insumo = Insumo::findOrFail($id);
        $insumo->update([
            'nombre'      => $request->nombre,
            'precio'      => $request->precio,
            'descripcion' => $request->descripcion,
            'stock'       => $request->stock,
        ]);

        return redirect()->route('spa.index')->with('success', 'Insumo del Spa actualizado correctamente.');
    }

    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect()->route('spa.index')->with('success', 'Insumo del Spa eliminado correctamente.');
    }
}