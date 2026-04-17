<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.habitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Creamos una nueva "caja" de tipo Habitacion
        $habitacion = new Habitacion();
        
        // 2. Llenamos la caja con los datos que llegaron del formulario
        $habitacion->nombre = $request->input('nombre');
        $habitacion->tipo = $request->input('tipo');
        $habitacion->precio = $request->input('precio');
        $habitacion->imagen_url = $request->input('imagen_url');
        $habitacion->descripcion = $request->input('descripcion');
        
        // 3. ¡El comando mágico que inserta todo en MySQL!
        $habitacion->save();

        // 4. Redirigimos al usuario de vuelta a la tabla principal
        return redirect()->route('habitaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // 1. Buscamos la habitación que el usuario quiere editar
        $habitacion = Habitacion::find($id);

        // 2. Le mandamos esa habitación a una nueva vista (que crearemos en un momento)
        return view('admin.habitaciones.edit', compact('habitacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Buscamos la habitación existente
        $habitacion = Habitacion::find($id);

        // 2. Actualizamos sus datos con lo que venga del formulario
        $habitacion->nombre = $request->input('nombre');
        $habitacion->tipo = $request->input('tipo');
        $habitacion->precio = $request->input('precio');
        $habitacion->imagen_url = $request->input('imagen_url');
        $habitacion->descripcion = $request->input('descripcion');

        // 3. Guardamos los cambios
        $habitacion->save();

        // 4. Regresamos a la tabla principal
        return redirect()->route('habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 1. Buscamos la habitación específica por su ID
        $habitacion = Habitacion::find($id);
        
        // 2. La eliminamos de la base de datos
        $habitacion->delete();

        // 3. Regresamos a la tabla principal
        return redirect()->route('habitaciones.index');
    }
}
