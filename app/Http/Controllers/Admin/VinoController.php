<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vino;
use Illuminate\Http\Request;

class VinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vinos = Vino::all();
        return view('admin.vinos.index', compact('vinos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vinos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
        ]);

        Vino::create($request->all());

        return redirect()->route('vinos.index')
            ->with('success', 'Vino creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vino $vino)
    {
        return view('admin.vinos.show', compact('vino'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vino $vino)
    {
        return view('admin.vinos.edit', compact('vino'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vino $vino)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
        ]);

        $vino->update($request->all());

        return redirect()->route('vinos.index')
            ->with('success', 'Vino actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vino $vino)
    {
        $vino->delete();

        return redirect()->route('vinos.index')
            ->with('success', 'Vino eliminado correctamente.');
    }
}
