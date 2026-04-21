<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hotel Therian</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400;0,6..96,700;1,6..96,400;1,6..96,700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/loging.css') }}">
</head>
<body>
    <div class="background" aria-hidden="true"></div> 

    <main class="main-container">
            @if ($errors->any())
            <div style="background-color: #e74c3c; color: white; padding: 15px; text-align: center; z-index: 100; position: relative;">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <header class="logo">
            <figure>
                <img src="{{ asset('imagenes/logohotel.png') }}" alt="Logotipo del Hotel">
            </figure>
        </header>
        
        <section class="container" id="container">
            
            <article class="form-container sign-in-container">
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf 
                    <h1>Iniciar Sesión</h1>
                    
                    <fieldset class="input-group">
                        <label for="loginEmail" class="sr-only">Correo electrónico</label>
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <input type="email" id="loginEmail" name="email" placeholder="Correo electrónico" required>
                    </fieldset>

                    <fieldset class="input-group">
                        <label for="loginPassword" class="sr-only">Contraseña</label>
                        <i class="fas fa-lock" aria-hidden="true"></i>
                        <input type="password" id="loginPassword" name="password" placeholder="Contraseña" required>
                    </fieldset>
                    
                    <button type="submit">Iniciar Sesión</button>
                </form>
            </article>

            <article class="form-container sign-up-container">
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <h1>Registrarse</h1>
                    
                    <fieldset class="input-group">
                        <label for="registerName" class="sr-only">Nombre completo</label>
                        <i class="fas fa-user" aria-hidden="true"></i>                   
                        <input type="text" id="registerName" name="nombre" placeholder="Nombre completo" required>                       
                    </fieldset>
                    
                    <fieldset class="input-group">
                        <label for="registerEmail" class="sr-only">Correo electrónico</label>
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <input type="email" id="registerEmail" name="email" placeholder="Correo electrónico" required>
                    </fieldset>
                    
                    <fieldset class="input-group">
                        <label for="registerPassword" class="sr-only">Contraseña</label>
                        <i class="fas fa-lock" aria-hidden="true"></i>
                        <input type="password" id="registerPassword" name="password" placeholder="Contraseña" required>
                    </fieldset>
                    
                    <button type="submit">Registrarse</button>
                </form>
            </article>

            <aside class="overlay-container" aria-label="Controles de cambio de vista">
                <div class="overlay">
                    <section class="overlay-panel overlay-left">
                        <h2>¡Bienvenido de vuelta!</h2>
                        <p>¿Ya tienes una cuenta? Inicia sesión aquí</p>
                        <button type="button" class="ghost" id="signIn">Iniciar Sesión</button>
                    </section>
                    <section class="overlay-panel overlay-right">
                        <h2>¡Hola, nuevo usuario!</h2>
                        <p>¿No tienes una cuenta? Regístrate aquí</p>
                        <button type="button" class="ghost" id="signUp">Registrarse</button>
                    </section>
                </div>
            </aside>

        </section>
    </main>
    
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>