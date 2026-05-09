<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Habitación | Admin Therian</title>
    
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
            <h1>Nueva Habitación</h1>
            <a href="{{ route('habitaciones.index') }}" class="btn-linea"><i class="fas fa-arrow-left"></i> Volver</a>
        </header>

        <section class="form-container">
            <form action="{{ route('habitaciones.store') }}" method="POST">
    @csrf
    
    <div style="margin-bottom: 20px;">
        <label style="color: #dcb38a;">Número de Habitación (Ej: 101)</label>
        <input type="number" name="numero" required style="width: 100%; padding: 10px; background: #1a1a1a; color: white; border: 1px solid #333;">
    </div>

    <div style="margin-bottom: 20px;">
        <label style="color: #dcb38a;">ID del Tipo (Ej: 1 para Suite, 2 para Sencilla)</label>
        <input type="number" name="tipo_habitacion_id" required style="width: 100%; padding: 10px; background: #1a1a1a; color: white; border: 1px solid #333;">
    </div>

    <div style="margin-bottom: 20px;">
        <label style="color: #dcb38a;">Estado</label>
        <select name="estado" required style="width: 100%; padding: 10px; background: #1a1a1a; color: white; border: 1px solid #333;">
            <option value="Disponible">Disponible</option>
            <option value="Ocupada">Ocupada</option>
            <option value="Mantenimiento">Mantenimiento</option>
        </select>
    </div>

    <button type="submit" style="background-color: #dcb38a; color: #111; padding: 10px 20px; border: none; font-weight: bold; cursor: pointer;">
        Guardar Habitación
    </button>
</form>
        </section>
    </main>
</body>
</html>
</html>