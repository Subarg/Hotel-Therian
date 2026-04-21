<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Habitación | Admin Therian</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; }
        body { display: flex; height: 100vh; background-color: #1a1a1a; color: white; overflow: hidden; }

        /* Sidebar (Heredado) */
        .sidebar { width: 260px; background-color: #111; padding: 30px 20px; border-right: 1px solid #333; display: flex; flex-direction: column; }
        .sidebar h2 { color: #c9b191; margin-bottom: 40px; font-size: 1.5rem; text-align: center; letter-spacing: 1px; }
        .sidebar ul { list-style: none; flex-grow: 1; }
        .sidebar li { margin-bottom: 15px; }
        .sidebar a { color: #aaa; text-decoration: none; display: flex; align-items: center; gap: 15px; padding: 12px 20px; border-radius: 8px; transition: 0.3s; font-weight: 600; }
        .sidebar a:hover, .sidebar a.active { background-color: #c9b191; color: #111; }
        .btn-salir { margin-top: auto; color: #e74c3c !important; border: 1px solid #e74c3c; }

        /* Main Content */
        .main-content { flex: 1; padding: 40px 50px; overflow-y: auto; }
        .header-admin { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 1px solid #333; padding-bottom: 20px; }
        
        .btn-linea { background: transparent; color: #aaa; border: 1px solid #555; padding: 10px 20px; border-radius: 20px; text-decoration: none; transition: 0.3s; }
        .btn-linea:hover { color: white; border-color: white; }
        .btn-dorado { background-color: #c9b191; color: #111; padding: 15px 30px; border: none; border-radius: 25px; cursor: pointer; font-weight: bold; font-size: 1rem; width: 100%; margin-top: 20px; transition: 0.3s; }
        .btn-dorado:hover { background: white; }

        /* Estilos del Formulario */
        .form-container { background-color: #111; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); max-width: 800px; }
        .input-group { margin-bottom: 25px; border: none; }
        .input-group label { display: block; margin-bottom: 8px; color: #c9b191; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; }
        
        .input-group input, .input-group select, .input-group textarea { 
            width: 100%; padding: 15px; background-color: #1a1a1a; border: 1px solid #333; color: white; border-radius: 8px; outline: none; transition: 0.3s; font-size: 1rem;
        }
        .input-group input:focus, .input-group select:focus, .input-group textarea:focus { border-color: #c9b191; }
        
        .grid-2-col { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>Admin Therian</h2>
        <ul>
            <li><a href="{{ route('habitaciones.index') }}" class="active"><i class="fas fa-bed"></i> Habitaciones</a></li>
            <li><a href="#"><i class="fas fa-spa"></i> Cosas del Spa</a></li>
            <li><a href="#"><i class="fas fa-hiking"></i> Expediciones</a></li>
            <li><a href="#"><i class="fas fa-wine-glass-alt"></i> Catas de Vinos</a></li>
        </ul>
        <a href="/" class="btn-salir"><i class="fas fa-sign-out-alt"></i> Volver al Sitio</a>
    </aside>

    <main class="main-content">
        <header class="header-admin">
            <h1>Editar Habitación</h1>
            <a href="{{ route('habitaciones.index') }}" class="btn-linea"><i class="fas fa-arrow-left"></i> Cancelar</a>
        </header>

        <section class="form-container">
            <form action="{{ route('habitaciones.update', $habitacion->id) }}" method="POST">
                
                @csrf
                @method('PUT') <fieldset class="input-group">
                    <label for="nombre">Nombre de la Habitación</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $habitacion->nombre }}" required>
                </fieldset>

                <div class="grid-2-col">
                    <fieldset class="input-group">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo" required>
                            <option value="Estándar" {{ $habitacion->tipo == 'Estándar' ? 'selected' : '' }}>Estándar</option>
                            <option value="Doble" {{ $habitacion->tipo == 'Doble' ? 'selected' : '' }}>Doble</option>
                            <option value="Lujo" {{ $habitacion->tipo == 'Lujo' ? 'selected' : '' }}>Lujo</option>
                            <option value="Suite" {{ $habitacion->tipo == 'Suite' ? 'selected' : '' }}>Suite</option>
                        </select>
                    </fieldset>

                    <fieldset class="input-group">
                        <label for="precio">Precio por Noche ($)</label>
                        <input type="number" step="0.01" id="precio" name="precio" value="{{ $habitacion->precio }}" required>
                    </fieldset>
                </div>

                <fieldset class="input-group">
                    <label for="imagen_url">URL de la Imagen</label>
                    <input type="url" id="imagen_url" name="imagen_url" value="{{ $habitacion->imagen_url }}">
                </fieldset>

                <fieldset class="input-group">
                    <label for="disponible" style="display: inline-block;">¿Está disponible?</label>
                    <input type="checkbox" id="disponible" name="disponible" value="1" {{ $habitacion->disponible ? 'checked' : '' }} style="width: auto; margin-left: 10px; transform: scale(1.5);">
                </fieldset>

                <fieldset class="input-group">
                    <label for="descripcion">Descripción Breve</label>
                    <textarea id="descripcion" name="descripcion" rows="4">{{ $habitacion->descripcion }}</textarea>
                </fieldset>

                <button type="submit" class="btn-dorado">Actualizar Habitación</button>
            </form>
        </section>
    </main>

</body>
</html>