@extends('layouts.app')

@section('titulo', 'Catálogo de Habitaciones')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Inicio.css') }}">
    
    <style>
        /* Mantenemos el fondo elegante para esta sección específica */
        .resultados-container { padding: 60px 50px; min-height: 100vh; color: white; background-color: #111; margin-top: 80px; }
        
        .room-card {
            background-color: #1a1a1a; border-radius: 15px; overflow: hidden; border: 1px solid #333; transition: all 0.3s ease; display: flex; flex-direction: column;
        }
        .room-card:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(220, 179, 138, 0.15); border-color: #dcb38a; }
        .room-img { width: 100%; height: 250px; object-fit: cover; border-bottom: 2px solid #333; }
        .room-info { padding: 25px; display: flex; flex-direction: column; flex-grow: 1; }
        .room-title-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .room-title { margin: 0; color: #dcb38a; font-size: 1.4rem; }
        .room-badge { background-color: #333; color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; }
        .room-desc { color: #aaa; font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px; flex-grow: 1; }
        .room-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #333; padding-top: 20px; }
        .room-price { font-size: 1.6rem; font-weight: bold; color: white; }
        .room-price small { color: #888; font-size: 0.9rem; font-weight: normal; }
        
        .btn-reservar {
            background-color: #dcb38a; color: #111; border: none; padding: 12px 25px; border-radius: 25px; font-weight: bold; cursor: pointer; transition: 0.3s; text-transform: uppercase; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;
        }
        .btn-reservar:hover { background-color: white; transform: scale(1.05); }
    </style>
@endsection

@section('contenido')
<div class="resultados-container">
    
    <div style="text-align: center; margin-bottom: 60px;">
        <h1 style="color: #dcb38a; font-size: 3rem; margin-bottom: 10px;">Habitaciones Disponibles</h1>
        @if($llegada && $salida)
            <p style="color: #888; font-size: 1.1rem;">Mostrando opciones del <strong style="color:white;">{{ $llegada }}</strong> al <strong style="color:white;">{{ $salida }}</strong>.</p>
        @else
            <p style="color: #888; font-size: 1.1rem;">Descubre nuestras exclusivas opciones de alojamiento</p>
        @endif
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px; max-width: 1200px; margin: 0 auto;">
        
        @forelse($habitaciones as $habitacion)
            <article class="room-card">
                <img src="{{ $habitacion->imagen_url ?? 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=400&auto=format&fit=crop' }}" alt="{{ $habitacion->nombre }}" class="room-img">
                
                <div class="room-info">
                    <div class="room-title-bar">
                        <h3 class="room-title">{{ $habitacion->nombre }}</h3>
                        <span class="room-badge">{{ $habitacion->tipo }}</span>
                    </div>
                    
                    <p class="room-desc">{{ $habitacion->descripcion }}</p>
                    
                    <div class="room-footer">
                        <div>
                            <span class="room-price">${{ number_format($habitacion->precio, 2) }}</span>
                            <small>/ noche</small>
                        </div>
                        
                        <button class="btn-reservar agregar-carrito" 
                                data-id="hab-{{ $habitacion->id }}" 
                                data-nombre="{{ $habitacion->nombre }}" 
                                data-precio="{{ $habitacion->precio }}"
                                data-imagen="{{ $habitacion->imagen_url }}">
                            <i class="fas fa-shopping-cart"></i> Reservar
                        </button>
                    </div>
                </div>
            </article>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 50px; background-color: #1a1a1a; border-radius: 15px;">
                <i class="fas fa-bed" style="font-size: 3rem; color: #555; margin-bottom: 20px;"></i>
                <h2>Catálogo Vacío</h2>
                <p style="color: #888;">Actualmente no hay habitaciones registradas.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const botonesReservar = document.querySelectorAll('.agregar-carrito');
    
    botonesReservar.forEach(boton => {
        boton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // 1. Extraemos los datos exactos del botón
            const nombre = this.getAttribute('data-nombre');
            const precio = parseFloat(this.getAttribute('data-precio'));
            
            // 2. Nos comunicamos con TU archivo scripts.js usando el objeto global
            if (window.hotelCart) {
                window.hotelCart.addItem({
                    type: 'Habitación',
                    name: nombre,
                    details: 'Tarifa por noche',
                    amount: precio
                });
                
                // 3. Abrimos tu panel lateral automáticamente
                if (typeof openCartPanel === 'function') {
                    openCartPanel();
                }
                
                // 4. Efecto visual de éxito en el botón
                const textoOriginal = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> ¡Agregada!';
                this.style.backgroundColor = '#4CAF50';
                this.style.color = 'white';
                
                setTimeout(() => {
                    this.innerHTML = textoOriginal;
                    this.style.backgroundColor = '#dcb38a';
                    this.style.color = '#111';
                }, 2000);
            } else {
                console.error("No se detectó el archivo scripts.js del carrito.");
            }
        });
    });
});
</script>
@endsection