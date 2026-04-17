<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Habitaciones | Hotel Therian</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* Estilos Base del Panel Admin */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        body { display: flex; height: 100vh; background-color: #1a1a1a; color: white; overflow: hidden; }

        /* Barra Lateral (Sidebar) */
        .sidebar { width: 260px; background-color: #111; padding: 30px 20px; border-right: 1px solid #333; display: flex; flex-direction: column; }
        .sidebar h2 { color: #c9b191; margin-bottom: 40px; font-size: 1.5rem; text-align: center; letter-spacing: 1px; }
        .sidebar ul { list-style: none; flex-grow: 1; }
        .sidebar li { margin-bottom: 15px; }
        .sidebar a { color: #aaa; text-decoration: none; display: flex; align-items: center; gap: 15px; padding: 12px 20px; border-radius: 8px; transition: 0.3s; font-weight: 600; }
        .sidebar a:hover, .sidebar a.active { background-color: #c9b191; color: #111; }
        .btn-salir { margin-top: auto; color: #e74c3c !important; border: 1px solid #e74c3c; }
        .btn-salir:hover { background-color: #e74c3c !important; color: white !important; }

        /* Contenido Principal */
        .main-content { flex: 1; padding: 40px 50px; overflow-y: auto; }
        .header-admin { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 1px solid #333; padding-bottom: 20px; }
        .header-admin h1 { font-size: 2.2rem; font-weight: 300; }
        
        .btn-dorado { background-color: #c9b191; color: #111; padding: 12px 25px; border: none; border-radius: 25px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: 0.3s; }
        .btn-dorado:hover { background-color: white; }

        /* Tabla de Datos */
        .table-container { background-color: #111; border-radius: 15px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 18px 15px; border-bottom: 1px solid #222; }
        th { color: #c9b191; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; }
        tr:hover { background-color: #1a1a1a; }
        
        /* Elementos de la tabla */
        .img-preview { width: 60px; height: 40px; object-fit: cover; border-radius: 5px; }
        .badge-active { background: rgba(39, 174, 96, 0.2); color: #2ecc71; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; border: 1px solid #2ecc71; }
        
        .btn-accion { background: transparent; border: none; cursor: pointer; font-size: 1.2rem; margin-right: 15px; transition: 0.3s; }
        .btn-edit { color: #3498db; }
        .btn-edit:hover { color: #2980b9; transform: scale(1.1); }
        .btn-delete { color: #e74c3c; }
        .btn-delete:hover { color: #c0392b; transform: scale(1.1); }
    </style>
</head>
<body>

    <aside class="sidebar">
    <h2>Admin Therian</h2>
    <ul>
        @if(Auth::user()->rol_id == 1)
            <li><a href="{{ route('habitaciones.index') }}"><i class="fas fa-bed"></i> Habitaciones</a></li>
        @endif

        @if(in_array(Auth::user()->rol_id, [1, 3]))
            <li><a href="{{ route('spa.index') }}"><i class="fas fa-spa"></i> Cosas del Spa</a></li>
        @endif

        @if(in_array(Auth::user()->rol_id, [1, 4]))
            <li><a href="#"><i class="fas fa-hiking"></i> Expediciones</a></li>
        @endif

        @if(in_array(Auth::user()->rol_id, [1, 5]))
            <li><a href="#"><i class="fas fa-wine-glass-alt"></i> Catas de Vinos</a></li>
        @endif
    </ul>
</aside>

    <main class="main-content">
        <header class="header-admin">
            <h1>Gestión de Habitaciones</h1>
            <a href="{{ route('habitaciones.create') }}" class="btn-dorado"><i class="fas fa-plus"></i> Agregar Habitación</a>
            
        </header>

        <section class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Precio (Noche)</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($habitaciones as $habitacion)
                    <tr>
                        <td>
                            @if($habitacion->imagen_url)
                                <img src="{{ $habitacion->imagen_url }}" class="img-preview" alt="{{ $habitacion->nombre }}">
                            @else
                                <span style="color: #666; font-size: 0.8rem;">Sin foto</span>
                            @endif
                        </td>
                        <td><strong>{{ $habitacion->nombre }}</strong></td>
                        <td>{{ $habitacion->tipo }}</td>
                        <td>${{ number_format($habitacion->precio, 2) }}</td>
                        <td>
                            @if($habitacion->disponible)
                                <span class="badge-active">Disponible</span>
                            @else
                                <span class="badge-active" style="background: rgba(231, 76, 60, 0.2); color: #e74c3c; border-color: #e74c3c;">Ocupada</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('habitaciones.edit', $habitacion->id) }}" class="btn-accion btn-edit" title="Editar"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('habitaciones.destroy', $habitacion->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta habitación?');">
                            @csrf
                            @method('DELETE') <button type="submit" class="btn-accion btn-delete" title="Eliminar"><i class="fas fa-trash"></i></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>