<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Reserva Confirmada! - Hotel Therian</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Fondo oscuro y centrado perfecto usando Flexbox */
        body { 
            background-color: #111; 
            margin: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .exito-container {
            max-width: 600px;
            text-align: center;
            background-color: #1a1a1a;
            padding: 60px 50px;
            border-radius: 15px;
            border: 1px solid #333;
            box-shadow: 0 15px 40px rgba(220, 179, 138, 0.15);
        }
        
        .icono-exito {
            font-size: 6rem;
            color: #2ecc71; 
            margin-bottom: 25px;
            animation: latido 1s ease-in-out infinite alternate;
        }
        
        .titulo-exito {
            color: #dcb38a;
            font-size: 2.5rem;
            margin-bottom: 15px;
            margin-top: 0;
        }
        
        .texto-exito {
            color: #aaa;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 40px;
        }
        
        .btn-inicio {
            background-color: #dcb38a;
            color: #111;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-inicio:hover {
            background-color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
        }

        @keyframes latido {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }
    </style>
</head>
<body>

    <div class="exito-container">
        <i class="fas fa-check-circle icono-exito"></i>
        <h1 class="titulo-exito">¡Pago Procesado con Éxito!</h1>
        
        <p class="texto-exito">
            Tu reserva en <strong>Hotel Therian</strong> ha sido confirmada y asegurada. <br><br>
            Hemos enviado el recibo de la transacción y los detalles de tu estancia a tu correo electrónico. Nos vemos pronto para una experiencia extraordinaria.
        </p>
        
        <a href="/inicio" class="btn-inicio">Volver al Inicio</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Borramos el carrito de la memoria del navegador
            localStorage.removeItem('hotelTherianCart');
        });
    </script>

</body>
</html>