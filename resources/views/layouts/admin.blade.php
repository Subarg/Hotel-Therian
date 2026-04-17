<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Hotel Therian</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Therian</h2>
            <div class="user-info">Hola, {{ Auth::user()->nombre }}</div>
            <ul>
                @if(Auth::user()->rol_id == 1)
                    <li><a href="{{ route('habitaciones.index') }}"><i class="fas fa-bed"></i> Habitaciones</a></li>
                @endif

                @if(in_array(Auth::user()->rol_id, [1, 3]))
                    <li><a href="{{ route('spa.index') }}"><i class="fas fa-spa"></i> Cosas del Spa</a></li>
                @endif
                
                </ul>
            <form action="/logout" method="POST">@csrf <button type="submit">Cerrar Sesión</button></form>
        </aside>

        <main class="content">
            @yield('contenido') </main>
    </div>
</body>
</html>