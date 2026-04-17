@extends('layouts.app')

@section('titulo', 'Experiencias - Hotel Therian')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/experiencias.css') }}">
@endsection

@section('contenido')

    <div id="overlay-carrito" class="overlay-carrito" hidden></div>

    <main class="seccion-moderna">

        <section class="hero-experiencias">
            <div class="hero-texto">
                <h1>Encuentra Experiencias <br> Premium</h1>
                <p>Momentos diseñados a la medida para despertar tus sentidos y crear recuerdos inolvidables.</p>
            </div>

            <article class="barra-flotante">
                <div class="filtro-item">Spa y Relajación</div>
                <div class="filtro-item">Alta Cocina</div>
                <div class="filtro-item">Aventura Local</div>
                <div class="filtro-item">Cultura</div>
            </article>
        </section>

        <section class="contenedor-tarjetas">
            <h2 class="titulo-seccion">Para tu Descanso y Placer</h2>

            <div class="grid-tres-columnas">
                <article class="tarjeta-limpia">
                    <figure>
                        <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?q=80&w=600&auto=format&fit=crop"
                            alt="Masaje en Spa">
                    </figure>
                    <div class="tarjeta-cuerpo">
                        <h3>Santuario Spa</h3>
                        <p>Libera la tensión en nuestro spa de clase mundial con terapias holísticas y masajes
                            ancestrales.</p>
                            <a class="btn-sutil" href="/spa">
                                <i class="fas fa-spa"></i> Ver vista Spa
                            </a>
                    </div>
                </article>

                <article class="tarjeta-limpia">
                    <figure>
                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=600&auto=format&fit=crop"
                            alt="Cena gourmet">
                    </figure>
                    <div class="tarjeta-cuerpo">
                        <h3>Cata de Vinos</h3>
                        <p>Descubre sabores extraordinarios guiado por nuestro sommelier en la cava subterránea del
                            hotel.</p>
                        <a class="btn-sutil" href="/vinos">
                            <i class="fas fa-wine-glass-alt"></i> Ver vista Cata de Vinos
                        </a>
                    </div>
                </article>

                <article class="tarjeta-limpia">
                    <figure>
                        <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?q=80&w=600&auto=format&fit=crop"
                            alt="Excursión">
                    </figure>
                    <div class="tarjeta-cuerpo">
                        <h3>Rutas Privadas</h3>
                        <p>Explora paisajes recónditos con un guía privado y termina el día con un picnic de lujo al
                            atardecer.</p>
                        <a class="btn-sutil" href="/rutas">
                            <i class="fas fa-route"></i> Ver vista Rutas Privadas
                        </a>
                    </div>
                </article>
            </div>
        </section>

        <section class="contenedor-tarjetas">
            <article class="tarjeta-ancha">
                <figure class="ancha-img">
                    <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?q=80&w=800&auto=format&fit=crop"
                        alt="Paseo en yate">
                </figure>
                <div class="ancha-texto">
                    <h2>Descubre Excursiones Marítimas Cerca de Ti</h2>
                    <p>Navega por las aguas cristalinas en nuestro yate privado. Disfruta de una tarde de snorkel,
                        bebidas premium y la brisa del mar en total exclusividad.</p>
                    <button class="btn-oscuro" onclick="agregarAlCarrito('Excursion maritima privada', 2200)">Reservar experiencia</button>
                </div>
            </article>
        </section>

    </main>

    
    @endsection