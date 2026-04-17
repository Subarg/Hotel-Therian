@extends('layouts.app')

@section('titulo', 'Galería - Hotel Therian')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">
@endsection

@section('contenido')

    <div id="overlay-carrito" class="overlay-carrito" hidden></div>

    <main class="seccion-galeria">
        
        <section class="hero-overlap">
            <div class="hero-contenido">
                <h1>Descubre la Belleza <br> Arquitectónica</h1>
                <p>Construyendo memorias con elegancia y excelencia en cada rincón.</p>
                <button class="btn-dorado">Ver Recorrido</button>
            </div>
        </section>

        <section class="tarjetas-superpuestas">
            <article class="tarjeta-oscura">
                <figure>
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=600&auto=format&fit=crop" alt="Suites">
                </figure>
                <div class="info-tarjeta">
                    <h3>Suites de Lujo <i class="fas fa-bed"></i></h3>
                    <p>Espacios diseñados para el máximo confort y privacidad absoluta.</p>
                    <a href="#" class="enlace-btn">Descubrir Más</a>
                </div>
            </article>

            <article class="tarjeta-oscura">
                <figure>
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=600&auto=format&fit=crop" alt="Diseño interior">
                </figure>
                <div class="info-tarjeta">
                    <h3>Diseño Interior <i class="fas fa-couch"></i></h3>
                    <p>Una fusión perfecta entre minimalismo moderno y calidez natural.</p>
                    <a href="#" class="enlace-btn">Descubrir Más</a>
                </div>
            </article>

            <article class="tarjeta-oscura">
                <figure>
                    <img src="https://images.unsplash.com/photo-1560448070-9bfa1c8e5a1c?q=80&w=600&auto=format&fit=crop" alt="Áreas comunes">
                <div class="info-tarjeta">
                    <h3>Áreas Comunes <i class="fas fa-swimming-pool"></i></h3>
                    <p>Instalaciones de primer nivel para enriquecer tu estancia.</p>
                    <a href="#" class="enlace-btn">Descubrir Más</a>
                </div>
            </article>
        </section>

        <section class="seccion-dividida">
            <article class="mitad-img">
                <h2>Nuestra Esencia</h2>
                <figure class="imagen-acento">
                    <img src="https://images.unsplash.com/photo-1618221118493-9cfa1a1c00da?q=80&w=800&auto=format&fit=crop" alt="Lobby del hotel">
                </figure>
            </article>

            <article class="mitad-texto">
                <h2>Nuestros Detalles</h2>
                <div class="grid-caracteristicas">
                    <div class="item-caracteristica">
                        <i class="fas fa-gem"></i>
                        <div>
                            <h4>Materiales Premium</h4>
                            <p>Mármol y maderas exóticas en cada suite.</p>
                        </div>
                    </div>
                    <div class="item-caracteristica">
                        <i class="fas fa-leaf"></i>
                        <div>
                            <h4>Eco-Sostenible</h4>
                            <p>Diseño en armonía con la naturaleza.</p>
                        </div>
                    </div>
                    <div class="item-caracteristica">
                        <i class="fas fa-concierge-bell"></i>
                        <div>
                            <h4>Servicio 24/7</h4>
                            <p>Atención personalizada en todo momento.</p>
                        </div>
                    </div>
                    <div class="item-caracteristica">
                        <i class="fas fa-wifi"></i>
                        <div>
                            <h4>Conectividad</h4>
                            <p>Alta velocidad en todas las instalaciones.</p>
                        </div>
                    </div>
                </div>
                <button class="btn-dorado">Saber Más</button>
            </article>
        </section>

    </main>   
    @endsection