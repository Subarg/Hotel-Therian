@extends('layouts.admin')

@section('contenido')
    <div class="header-admin">
        <div>
            <h1>Agregar Nueva Ruta</h1>
            <p class="subtitle">Registra una nueva experiencia para las expediciones del hotel.</p>
        </div>
        <a href="{{ route('rutas.index') }}" class="btn-linea"><i class="fas fa-arrow-left"></i> Volver al listado</a>
    </div>

    <section class="form-container">
        <form action="{{ route('rutas.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <label for="nombre"><i class="fas fa-map-signs"></i> Nombre de la Ruta</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Sendero del Bosque" required class="@error('nombre') is-invalid @enderror">
                @error('nombre') <span class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" placeholder="Describe la ruta, puntos de interés, etc." required class="@error('descripcion') is-invalid @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion') <span class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
            </div>

            <div class="grid-2-col">
                <div class="input-group">
                    <label for="duracion"><i class="fas fa-clock"></i> Duración</label>
                    <input type="text" id="duracion" name="duracion" value="{{ old('duracion') }}" placeholder="Ej: 3 horas" required class="@error('duracion') is-invalid @enderror">
                    @error('duracion') <span class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                </div>

                <div class="input-group">
                    <label for="dificultad"><i class="fas fa-mountain"></i> Dificultad</label>
                    <select id="dificultad" name="dificultad" required class="@error('dificultad') is-invalid @enderror">
                        <option value="Fácil" {{ old('dificultad') == 'Fácil' ? 'selected' : '' }}>Fácil</option>
                        <option value="Moderada" {{ old('dificultad') == 'Moderada' ? 'selected' : '' }}>Moderada</option>
                        <option value="Difícil" {{ old('dificultad') == 'Difícil' ? 'selected' : '' }}>Difícil</option>
                    </select>
                    @error('dificultad') <span class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                </div>
            </div>

            <div class="input-group">
                <label for="precio"><i class="fas fa-tag"></i> Precio por Persona ($)</label>
                <input type="number" step="0.01" id="precio" name="precio" value="{{ old('precio') }}" placeholder="Ej: 500.00" required class="@error('precio') is-invalid @enderror">
                @error('precio') <span class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-dorado"><i class="fas fa-save"></i> Guardar Ruta</button>
        </form>
    </section>
@endsection

@section('styles')
<style>
    /* Estructura del Header */
    .header-admin { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 1px solid #333; padding-bottom: 20px; }
    .header-admin h1 { margin: 0; color: white; }
    .subtitle { color: #888; font-size: 0.9rem; margin-top: 5px; }
    
    /* Botones */
    .btn-linea { background: transparent; color: #aaa; border: 1px solid #555; padding: 10px 20px; border-radius: 20px; text-decoration: none; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px; }
    .btn-linea:hover { color: white; border-color: white; }
    
    .btn-dorado { background-color: #dcb38a; color: #111; padding: 15px 30px; border: none; border-radius: 25px; cursor: pointer; font-weight: bold; font-size: 1rem; width: 100%; margin-top: 10px; transition: 0.3s; display: inline-flex; justify-content: center; align-items: center; gap: 10px; }
    .btn-dorado:hover { background: white; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(220, 179, 138, 0.2); }

    /* Estilos del Formulario */
    .form-container { background-color: #111; padding: 40px; border-radius: 15px; border: 1px solid #222; box-shadow: 0 10px 30px rgba(0,0,0,0.5); max-width: 800px; margin: auto; }
    .input-group { margin-bottom: 25px; }
    .input-group label { display: flex; align-items: center; gap: 8px; margin-bottom: 10px; color: #dcb38a; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; }
    
    .input-group input, .input-group select, .input-group textarea { 
        width: 100%; padding: 15px; background-color: #1a1a1a; border: 1px solid #333; color: white; border-radius: 8px; outline: none; transition: 0.3s; font-size: 1rem; box-sizing: border-box;
    }
    
    /* Efecto al seleccionar un input */
    .input-group input:focus, .input-group select:focus, .input-group textarea:focus { border-color: #dcb38a; box-shadow: 0 0 8px rgba(220, 179, 138, 0.1); }
    
    .grid-2-col { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

    /* Estilos automáticos para Errores de Validación de Laravel */
    .input-group input.is-invalid, .input-group select.is-invalid, .input-group textarea.is-invalid {
        border-color: #e74c3c;
    }
    .error-text {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 8px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
</style>
@endsection