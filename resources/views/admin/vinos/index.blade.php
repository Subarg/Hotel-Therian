@extends('layouts.admin')

@section('contenido')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Gestión de Vinos</h1>
        
        <a href="{{ route('vinos.create') }}" style="background-color: #dcb38a; color: #1a1a1a; padding: 10px 20px; border-radius: 20px; text-decoration: none; font-weight: bold;">
            <i class="fas fa-plus"></i> Agregar Vino
        </a>
        
    </div>

    <table style="width: 100%; border-collapse: collapse; text-align: left; color: white;">
        <thead>
            <tr style="border-bottom: 1px solid #333;">
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">NOMBRE</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">DESCRIPCIÓN</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">PRECIO</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vinos as $vino)
            <tr style="border-bottom: 1px solid #333; background-color: #1a1a1a;">
                <td style="padding: 15px;">{{ $vino->nombre }}</td>
                <td style="padding: 15px;">{{ $vino->descripcion }}</td>
                <td style="padding: 15px;">${{ number_format($vino->precio, 2) }}</td>
                <td style="padding: 15px;">
                    <a href="{{ route('vinos.edit', $vino->id) }}" style="color: #f39c12; margin-right: 10px; text-decoration: none;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('vinos.destroy', $vino->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer;" onclick="return confirm('¿Seguro que deseas eliminar este vino?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection