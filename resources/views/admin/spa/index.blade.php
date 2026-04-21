@extends('layouts.admin')

@section('contenido')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Inventario del Spa</h1>
        
        <a href="{{ route('spa.create') }}" style="background-color: #dcb38a; color: #1a1a1a; padding: 10px 20px; border-radius: 20px; text-decoration: none; font-weight: bold;">
            <i class="fas fa-plus"></i> Agregar Insumo/Servicio
        </a>
        
    </div>

    @if(session('success'))
        <div style="background-color: #2ecc71; color: white; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; text-align: left; color: white;">
        <thead>
            <tr style="border-bottom: 1px solid #333;">
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">NOMBRE</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">PRECIO</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">STOCK</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">DESCRIPCIÓN</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($insumos as $insumo)
            <tr style="border-bottom: 1px solid #333; background-color: #1a1a1a;">
                <td style="padding: 15px;">{{ $insumo->nombre }}</td>
                <td style="padding: 15px;">${{ number_format($insumo->precio, 2) }}</td>
                <td style="padding: 15px;">{{ $insumo->stock }}</td>
                <td style="padding: 15px;">{{ Str::limit($insumo->descripcion, 50) }}</td>
                <td style="padding: 15px;">
                    <a href="{{ route('spa.edit', $insumo->id) }}" style="color: #f39c12; margin-right: 10px; text-decoration: none;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('spa.destroy', $insumo->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer;" onclick="return confirm('¿Seguro que deseas eliminar este insumo/servicio?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding: 15px; text-align: center; color: #888;">No hay insumos del spa registrados todavía.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection