@extends('layouts.app')

@section('titulo', 'Spa & Wellness - Hotel Therian')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/spa.css') }}">
@endsection

@section('contenido')

    <div id="overlay-carrito" class="overlay-carrito" hidden></div>

    <main class="seccion-spa">
        
        <section class="hero-spa">
            <div class="hero-contenido-spa">
                <h1>Santuario Therian</h1>
                <p>Un refugio para el cuerpo, la mente y el alma. Descubre nuestra exclusiva selección de tratamientos holísticos.</p>
            </div>
        </section>

        <section class="contenedor-servicios">
            
            <div class="categoria-spa">
                <h2 class="titulo-categoria">Masajes Terapéuticos <i class="fas fa-leaf"></i></h2>
                <div class="grid-spa">
                    
                    <article class="tarjeta-spa">
                        <img src="https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?q=80&w=600&auto=format&fit=crop" alt="Masaje Relajante">
                        <div class="info-spa">
                            <h3>Masaje Sueco Relajante</h3>
                            <p class="duracion">60 min | Presión suave a media</p>
                            <p class="desc">Técnica clásica que alivia la tensión muscular y mejora la circulación utilizando aceites esenciales orgánicos.</p>
                            <div class="compra-spa">
                                <span class="precio">$1,200</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Masaje Sueco', 1200)">Reservar</button>
                            </div>
                        </div>
                    </article>

                    <article class="tarjeta-spa">
                        <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?q=80&w=600&auto=format&fit=crop" alt="Masaje Tejido Profundo">
                        <div class="info-spa">
                            <h3>Tejido Profundo</h3>
                            <p class="duracion">90 min | Presión firme</p>
                            <p class="desc">Ideal para liberar nudos crónicos y tensión acumulada en las capas más profundas del músculo.</p>
                            <div class="compra-spa">
                                <span class="precio">$1,800</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Masaje Tejido Profundo', 1800)">Reservar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class="categoria-spa">
                <h2 class="titulo-categoria">Cuidado Facial <i class="fas fa-spa"></i></h2>
                <div class="grid-spa">
                    
                    <article class="tarjeta-spa">
                        <img src="https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?q=80&w=600&auto=format&fit=crop" alt="Facial Hidratante">
                        <div class="info-spa">
                            <h3>Hidratación Profunda</h3>
                            <p class="duracion">50 min | Todo tipo de piel</p>
                            <p class="desc">Tratamiento con ácido hialurónico y mascarillas botánicas para devolverle la luminosidad a tu rostro.</p>
                            <div class="compra-spa">
                                <span class="precio">$950</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Facial Hidratante', 950)">Reservar</button>
                            </div>
                        </div>
                    </article>

                    <article class="tarjeta-spa">
                        <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?q=80&w=600&auto=format&fit=crop" alt="Facial Anti-Edad">
                        <div class="info-spa">
                            <h3>Ritual Anti-Edad ORO</h3>
                            <p class="duracion">75 min | Pieles maduras</p>
                            <p class="desc">Exclusivo tratamiento con láminas de oro de 24k y colágeno para un efecto lifting inmediato.</p>
                            <div class="compra-spa">
                                <span class="precio">$2,500</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Facial Anti-Edad Oro', 2500)">Reservar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class="categoria-spa">
                <h2 class="titulo-categoria">Rituales de Agua <i class="fas fa-water"></i></h2>
                <div class="grid-spa">
                    
                    <article class="tarjeta-spa">
                        <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=600&auto=format&fit=crop" alt="Circuito Hidrotermal">
                        <div class="info-spa">
                            <h3>Circuito Hidrotermal</h3>
                            <p class="duracion">120 min | Acceso general</p>
                            <p class="desc">Recorrido por sauna, baño turco, fosa fría y piscina de hidroterapia con chorros a presión.</p>
                            <div class="compra-spa">
                                <span class="precio">$800</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Circuito Hidrotermal', 800)">Reservar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

        </section>
    </main>

    @endsection