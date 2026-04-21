@extends('layouts.admin')

@section('contenido')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>Gestión de Habitaciones</h1>
        
        <a href="{{ route('habitaciones.create') }}" style="background-color: #dcb38a; color: #1a1a1a; padding: 10px 20px; border-radius: 20px; text-decoration: none; font-weight: bold;">
            <i class="fas fa-plus"></i> Agregar Habitación
        </a>
        
    </div>

    <table style="width: 100%; border-collapse: collapse; text-align: left; color: white;">
        <thead>
            <tr style="border-bottom: 1px solid #333;">
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">IMAGEN</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">NOMBRE</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">TIPO</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">PRECIO (NOCHE)</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">ESTADO</th>
                <th style="padding: 15px; color: #dcb38a; font-size: 0.9rem;">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitaciones as $habitacion)
            <tr style="border-bottom: 1px solid #333; background-color: #1a1a1a;">
                <td style="padding: 15px;">
                    @if($habitacion->imagen_url)
                        <img src="{{ $habitacion->imagen_url }}" alt="Imagen de {{ $habitacion->nombre }}" style="width: 80px; height: 50px; object-fit: cover; border-radius: 5px;">
                    @else
                        <div style="width: 80px; height: 50px; background-color: #333; border-radius: 5px; display: flex; align-items: center; justify-content: center; color: #888;">N/A</div>
                    @endif
                </td>
                <td style="padding: 15px;">{{ $habitacion->nombre }}</td>
                <td style="padding: 15px;">{{ $habitacion->tipo }}</td>
                <td style="padding: 15px;">${{ number_format($habitacion->precio, 2) }}</td>
                <td style="padding: 15px;">
                    @if($habitacion->disponible)
                        <span style="color: #2ecc71; font-weight: bold;">Disponible</span>
                    @else
                        <span style="color: #e74c3c; font-weight: bold;">Ocupada</span>
                    @endif
                </td>
                <td style="padding: 15px;">
                    <a href="{{ route('habitaciones.edit', $habitacion->id) }}" style="color: #f39c12; margin-right: 10px; text-decoration: none;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('habitaciones.destroy', $habitacion->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer;" onclick="return confirm('¿Seguro que deseas eliminar esta habitación?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection