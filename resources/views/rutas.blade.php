@extends('layouts.app')

@section('titulo', 'Rutas y Expediciones - Hotel Therian')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/rutas.css') }}">
@endsection

@section('contenido')

    <div id="overlay-carrito" class="overlay-carrito" hidden></div>

    <main class="seccion-rutas">
        
        <section class="hero-rutas">
            <div class="hero-contenido-rutas">
                <h1>Rutas y Expediciones</h1>
                <p>Explora paisajes recónditos con un guía privado y termina el día con un picnic de lujo al atardecer.</p>
            </div>
        </section>

        <section class="contenedor-servicios">
            
            <div class="categoria-rutas">
                <h2 class="titulo-categoria">Conexión Natural <i class="fas fa-mountain"></i></h2>
                <div class="grid-rutas">
                    
                    <article class="tarjeta-rutas">
                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=600&auto=format&fit=crop" alt="Senderismo">
                        <div class="info-rutas">
                            <h3>Senderismo en la Sierra Norte</h3>
                            <p class="etiqueta">6 horas | Dificultad Media | Guía Privado</p>
                            <p class="desc">Adéntrate en los bosques nubosos. Una caminata inmersiva que culmina con vistas panorámicas y un picnic gourmet con ingredientes locales.</p>
                            <div class="compra-rutas">
                                <span class="precio">$2,200</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Senderismo Sierra Norte', 2200)">Reservar</button>
                            </div>
                        </div>
                    </article>

                    <article class="tarjeta-rutas">
                        <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?q=80&w=600&auto=format&fit=crop" alt="Cascadas">
                        <div class="info-rutas">
                            <h3>Expedición a Cascadas Ocultas</h3>
                            <p class="etiqueta">8 horas | Transporte VIP | Nado Libre</p>
                            <p class="desc">Descubre formaciones naturales y cascadas petrificadas. Incluye tiempo libre para nadar en manantiales cristalinos y almuerzo privado.</p>
                            <div class="compra-rutas">
                                <span class="precio">$3,500</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Expedición Cascadas', 3500)">Reservar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class="categoria-rutas">
                <h2 class="titulo-categoria">Cultura y Herencia <i class="fas fa-map-marked-alt"></i></h2>
                <div class="grid-rutas">
                    
                    <article class="tarjeta-rutas">
                        <img src="https://images.unsplash.com/photo-1518182170546-076616fdcb18?q=80&w=600&auto=format&fit=crop" alt="Ruinas Arqueológicas">
                        <div class="info-rutas">
                            <h3>Recinto Arqueológico al Amanecer</h3>
                            <p class="etiqueta">4 horas | Acceso Temprano | Historiador</p>
                            <p class="desc">Recorre los antiguos centros ceremoniales sin multitudes, acompañado por un experto en historia precolombina.</p>
                            <div class="compra-rutas">
                                <span class="precio">$1,800</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Zona Arqueológica Privada', 1800)">Reservar</button>
                            </div>
                        </div>
                    </article>

                    <article class="tarjeta-rutas">
                        <img src="https://images.unsplash.com/photo-1582293041079-7814c2f12063?q=80&w=600&auto=format&fit=crop" alt="Cultura del Agave">
                        <div class="info-rutas">
                            <h3>Ruta del Agave y Maestros</h3>
                            <p class="etiqueta">5 horas | Cata Incluida | Tour Cultural</p>
                            <p class="desc">Visita palenques artesanales exclusivos. Conoce el proceso ancestral de destilación guiado por los propios maestros y disfruta una cata premium.</p>
                            <div class="compra-rutas">
                                <span class="precio">$2,500</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Ruta del Agave', 2500)">Reservar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class="categoria-rutas">
                <h2 class="titulo-categoria">Aventuras de Altura <i class="fas fa-paper-plane"></i></h2>
                <div class="grid-rutas">
                    
                    <article class="tarjeta-rutas">
                        <img src="https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?q=80&w=600&auto=format&fit=crop" alt="Globo Aerostático">
                        <div class="info-rutas">
                            <h3>Vuelo en Globo sobre los Valles</h3>
                            <p class="etiqueta">3 horas | Amanecer | Brindis Incluido</p>
                            <p class="desc">Observa el despertar de la naturaleza desde las alturas. Al aterrizar, te esperará un desayuno campestre y un brindis con vino espumoso.</p>
                            <div class="compra-rutas">
                                <span class="precio">$5,800</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Vuelo en Globo', 5800)">Reservar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

        </section>
    </main>

    
    @endsection