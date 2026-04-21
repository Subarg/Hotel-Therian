@extends('layouts.admin')

@section('contenido')
    <div class="header-admin">
        <h1>Editar Ruta</h1>
        <a href="{{ route('rutas.index') }}" class="btn-linea"><i class="fas fa-arrow-left"></i> Cancelar</a>
    </div>

    <section class="form-container">
        <form action="{{ route('rutas.update', $ruta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <fieldset class="input-group">
                <label for="nombre">Nombre de la Ruta</label>
                <input type="text" id="nombre" name="nombre" value="{{ $ruta->nombre }}" required>
            </fieldset>

            <fieldset class="input-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" required>{{ $ruta->descripcion }}</textarea>
            </fieldset>

            <div class="grid-2-col">
                <fieldset class="input-group">
                    <label for="duracion">Duración</label>
                    <input type="text" id="duracion" name="duracion" value="{{ $ruta->duracion }}" required>
                </fieldset>

                <fieldset class="input-group">
                    <label for="dificultad">Dificultad</label>
                    <select id="dificultad" name="dificultad" required>
                        <option value="Fácil" {{ $ruta->dificultad == 'Fácil' ? 'selected' : '' }}>Fácil</option>
                        <option value="Moderada" {{ $ruta->dificultad == 'Moderada' ? 'selected' : '' }}>Moderada</option>
                        <option value="Difícil" {{ $ruta->dificultad == 'Difícil' ? 'selected' : '' }}>Difícil</option>
                    </select>
                </fieldset>
            </div>

            <fieldset class="input-group">
                <label for="precio">Precio por Persona ($)</label>
                <input type="number" step="0.01" id="precio" name="precio" value="{{ $ruta->precio }}" required>
            </fieldset>

            <button type="submit" class="btn-dorado">Actualizar Ruta</button>
        </form>
    </section>
@endsection

@section('styles')
<style>
    .main-content { flex: 1; padding: 40px 50px; overflow-y: auto; }
    .header-admin { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 1px solid #333; padding-bottom: 20px; }
    
    .btn-linea { background: transparent; color: #aaa; border: 1px solid #555; padding: 10px 20px; border-radius: 20px; text-decoration: none; transition: 0.3s; }
    .btn-linea:hover { color: white; border-color: white; }
    .btn-dorado { background-color: #c9b191; color: #111; padding: 15px 30px; border: none; border-radius: 25px; cursor: pointer; font-weight: bold; font-size: 1rem; width: 100%; margin-top: 20px; transition: 0.3s; }
    .btn-dorado:hover { background: white; }

    /* Estilos del Formulario */
    .form-container { background-color: #111; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); max-width: 800px; margin: auto; }
    .input-group { margin-bottom: 25px; border: none; }
    .input-group label { display: block; margin-bottom: 8px; color: #c9b191; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; }
    
    .input-group input, .input-group select, .input-group textarea { 
        width: 100%; padding: 15px; background-color: #1a1a1a; border: 1px solid #333; color: white; border-radius: 8px; outline: none; transition: 0.3s; font-size: 1rem;
    }
    .input-group input:focus, .input-group select:focus, .input-group textarea:focus { border-color: #c9b191; }
    .grid-2-col { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
</style>
@endsection
