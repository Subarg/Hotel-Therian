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
            <tr style="border-bottom: 1px solid #333; transition: 0.3s;">
                
                <td style="padding: 15px;">
                    <img src="{{ $habitacion->imagen_url ?? 'https://via.placeholder.com/100' }}" alt="Habitacion" style="width: 80px; height: 50px; border-radius: 5px; object-fit: cover;">
                </td>
                
                <td style="padding: 15px;">{{ $habitacion->nombre }}</td>
                
                <td style="padding: 15px;">{{ $habitacion->tipo }}</td>
                
                <td style="padding: 15px;">${{ number_format($habitacion->precio, 2) }}</td>
                
                <td style="padding: 15px; font-weight: bold; 
                    color: 
                    @if($habitacion->estado == 'Disponible') #2ecc71 
                    @elseif($habitacion->estado == 'Mantenimiento') #f39c12 
                    @else #e74c3c 
                    @endif;">
                    {{ $habitacion->estado }}
                </td>
                
                <td style="padding: 15px;">
                    <a href="#" style="color: #dcb38a; margin-right: 15px; text-decoration: none;"><i class="fas fa-edit"></i></a>
                    <form action="#" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer;"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection