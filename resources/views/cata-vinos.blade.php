@extends('layouts.app')

@section('titulo', 'Spa & Wellness - Hotel Therian')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cata-vinos.css') }}">
@endsection

@section('contenido')

    <div id="overlay-carrito" class="overlay-carrito" hidden></div>

    <main class="seccion-vinos">
        
        <section class="hero-vinos">
            <div class="hero-contenido-vinos">
                <h1>La Cava Therian</h1>
                <p>Una colección excepcional de etiquetas mundiales y experiencias enológicas guiadas por nuestro Sommelier en jefe.</p>
            </div>
        </section>

        <section class="contenedor-servicios">
            
            <div class="categoria-vinos">
                <h2 class="titulo-categoria">Vinos Tintos Premium <i class="fas fa-wine-bottle"></i></h2>
                <div class="grid-vinos">
                    
                    <article class="tarjeta-vinos">
                        <img src="https://images.unsplash.com/photo-1585553616435-2dc0a54e271d?q=80&w=600&auto=format&fit=crop" alt="Cabernet Sauvignon">
                        <div class="info-vinos">
                            <h3>Cabernet Sauvignon Gran Reserva</h3>
                            <p class="etiqueta">Botella 750ml | Valle de Guadalupe, MX</p>
                            <p class="desc">Notas intensas de frutos negros, roble tostado y un final elegante. Perfecto para acompañar carnes rojas de nuestro menú.</p>
                            <div class="compra-vinos">
                                <span class="precio">$1,500</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Cabernet Sauvignon Reserva', 1500)">Añadir</button>
                            </div>
                        </div>
                    </article>

                    <article class="tarjeta-vinos">
                        <img src="https://images.unsplash.com/photo-1506377247377-2a5b3b417ebb?q=80&w=600&auto=format&fit=crop" alt="Pinot Noir">
                        <div class="info-vinos">
                            <h3>Pinot Noir Cosecha Especial</h3>
                            <p class="etiqueta">Botella 750ml | Borgoña, Francia</p>
                            <p class="desc">Un tinto sutil y sofisticado con aromas a cereza madura, trufas y un toque terroso. Una joya para los paladares exigentes.</p>
                            <div class="compra-vinos">
                                <span class="precio">$2,800</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Pinot Noir Frances', 2800)">Añadir</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class="categoria-vinos">
                <h2 class="titulo-categoria">Blancos y Espumosos <i class="fas fa-wine-glass-alt"></i></h2>
                <div class="grid-vinos">
                    
                    <article class="tarjeta-vinos">
                        <img src="https://images.unsplash.com/photo-1558500220-431871f302a8?q=80&w=600&auto=format&fit=crop" alt="Chardonnay">
                        <div class="info-vinos">
                            <h3>Chardonnay de Autor</h3>
                            <p class="etiqueta">Botella 750ml | Napa Valley, USA</p>
                            <p class="desc">Fresco, con toques de manzana verde, cítricos y una suave textura de mantequilla por su paso en barrica.</p>
                            <div class="compra-vinos">
                                <span class="precio">$1,200</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Chardonnay Napa', 1200)">Añadir</button>
                            </div>
                        </div>
                    </article>

                    <article class="tarjeta-vinos">
                        <img src="https://images.unsplash.com/photo-1599940824399-b87987ceb72a?q=80&w=600&auto=format&fit=crop" alt="Champagne">
                        <div class="info-vinos">
                            <h3>Champagne Brut Imperial</h3>
                            <p class="etiqueta">Botella 750ml | Champagne, Francia</p>
                            <p class="desc">Burbuja fina y persistente con notas florales y de pan tostado. El complemento perfecto para celebrar en tu suite.</p>
                            <div class="compra-vinos">
                                <span class="precio">$3,500</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Champagne Brut', 3500)">Añadir</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class="categoria-vinos">
                <h2 class="titulo-categoria">Experiencias en Cava <i class="fas fa-glass-cheers"></i></h2>
                <div class="grid-vinos">
                    
                    <article class="tarjeta-vinos">
                        <img src="https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=600&auto=format&fit=crop" alt="Cata de vinos">
                        <div class="info-vinos">
                            <h3>Cata a Ciegas: 5 Tiempos</h3>
                            <p class="etiqueta">120 min | Cava Subterránea | 2 Personas</p>
                            <p class="desc">Un viaje sensorial guiado por nuestro Sommelier. Incluye la degustación de 5 etiquetas premium maridadas con quesos artesanales.</p>
                            <div class="compra-vinos">
                                <span class="precio">$4,000</span>
                                <button class="btn-dorado" onclick="agregarAlCarrito('Cata 5 Tiempos (2 pax)', 4000)">Reservar</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

        </section>
    </main>
@endsection