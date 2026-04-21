@extends('layouts.admin')

@section('contenido')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('spa.index') }}" style="color: #dcb38a; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Volver al inventario
        </a>
    </div>

    <h1 style="margin-bottom: 30px;">Editar Insumo/Servicio del Spa</h1>

    <div style="background-color: #111; padding: 30px; border-radius: 10px; border: 1px solid #333; max-width: 600px;">
        <form action="{{ route('spa.update', $insumo->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #888; margin-bottom: 8px;">Nombre del Insumo/Servicio</label>
                <input type="text" name="nombre" value="{{ $insumo->nombre }}" required style="width: 100%; padding: 12px; background-color: #1a1a1a; border: 1px solid #444; color: white; border-radius: 5px;">
            </div>

            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <label style="display: block; color: #888; margin-bottom: 8px;">Precio ($)</label>
                    <input type="number" step="0.01" name="precio" value="{{ $insumo->precio }}" required style="width: 100%; padding: 12px; background-color: #1a1a1a; border: 1px solid #444; color: white; border-radius: 5px;">
                </div>
                
                <div style="flex: 1;">
                    <label style="display: block; color: #888; margin-bottom: 8px;">Stock Disponibles</label>
                    <input type="number" name="stock" value="{{ $insumo->stock }}" min="0" required style="width: 100%; padding: 12px; background-color: #1a1a1a; border: 1px solid #444; color: white; border-radius: 5px;">
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; color: #888; margin-bottom: 8px;">Descripción</label>
                <textarea name="descripcion" rows="4" style="width: 100%; padding: 12px; background-color: #1a1a1a; border: 1px solid #444; color: white; border-radius: 5px; resize: vertical;">{{ $insumo->descripcion }}</textarea>
            </div>

            <button type="submit" style="background-color: #dcb38a; color: #1a1a1a; padding: 12px 25px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; width: 100%;">
                Actualizar Insumo
            </button>
        </form>
    </div>
@endsection