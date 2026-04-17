<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Hotel Therian??')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400;0,6..96,700;1,6..96,400;1,6..96,700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    @yield('css')
</head>
<body>

    <header class="glass-header" style="background-color: #111;">
        <div class="logo">Hotel Therian??</div>
        <nav>
            <ul>
                <li><a href="/inicio">Inicio</a></li>
                <li><a href="/destinos">Destinos</a></li>
                <li><a href="/experiencias">Experiencias</a></li>
                <li><a href="/galeria">Galería</a></li>
                <li>
                    <button type="button" id="btn-carrito" class="btn-carrito" aria-label="Abrir carrito de compras">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="contador-carrito" class="contador-carrito" aria-live="polite">0</span>
                    </button>
                </li>
            </ul>
        </nav>
    </header>

    <aside id="panel-carrito" class="panel-carrito" aria-label="Carrito de compras" aria-hidden="true">
        <header class="panel-carrito-header">
            <h3>Tu carrito</h3>
            <button type="button" id="cerrar-carrito" class="cerrar-carrito" aria-label="Cerrar carrito">X</button>
        </header>
        <ul id="lista-carrito" class="lista-carrito"></ul>
        <p id="carrito-vacio" class="carrito-vacio">Aun no hay servicios agregados.</p>
        <footer class="panel-carrito-footer">
            <button type="button" id="vaciar-carrito" class="btn-vaciar-carrito">Vaciar carrito</button>
            <button type="button" id="reservar-carrito" class="btn-reservar-carrito">Finalizar reservacion</button>
        </footer>
    </aside>
    <div id="overlay-carrito" class="overlay-carrito" hidden></div>

    @yield('contenido')

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>