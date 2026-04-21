<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Hotel Therian</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a; /* Fondo oscuro elegante */
            color: #f4f4f4;
            height: 100vh;
            overflow: hidden;
        }
        .admin-container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #111; /* Barra lateral un poco más oscura */
            padding: 30px 20px;
            border-right: 1px solid #333;
            display: flex;
            flex-direction: column;
        }
        .sidebar h2 {
            color: #dcb38a; /* Dorado Therian */
            margin-top: 0;
            margin-bottom: 10px;
        }
        .user-info {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #333;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            flex-grow: 1;
        }
        .sidebar ul li {
            margin-bottom: 20px;
        }
        .sidebar ul li a {
            color: #ccc;
            text-decoration: none;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.3s;
        }
        .sidebar ul li a:hover {
            color: #dcb38a;
        }
        .sidebar form button {
            background-color: transparent;
            color: #888;
            border: 1px solid #444;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        .sidebar form button:hover {
            background-color: #333;
            color: white;
        }
        .content {
            flex: 1;
            padding: 50px;
            overflow-y: auto;
        }
    </style>
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

                @if(in_array(Auth::user()->rol_id, [1, 4]))
                    <li><a href="{{ route('rutas.index') }}"><i class="fas fa-hiking"></i> Expediciones</a></li>
                @endif

                @if(in_array(Auth::user()->rol_id, [1, 5]))
                    <li><a href="{{ route('vinos.index') }}"><i class="fas fa-wine-glass-alt"></i> Catas de Vinos</a></li>
                @endif
            </ul>
            <form action="/logout" method="POST">@csrf <button type="submit">Cerrar Sesión</button></form>
        </aside>

        <main class="content">
            @yield('contenido') </main>
    </div>
</body>
</html>