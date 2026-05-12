<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .contenedor { max-width: 600px; margin: 0 auto; background-color: #111; color: white; padding: 40px; border-radius: 10px; text-align: center; border-top: 5px solid #dcb38a; }
        h1 { color: #dcb38a; }
        p { color: #ccc; line-height: 1.5; }
        .boton { display: inline-block; background-color: #dcb38a; color: #111; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 5px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>¡Gracias por elegir Hotel Therian!</h1>
        <p>Hola. Hemos recibido tu pago exitosamente y tu reserva ha quedado bloqueada en nuestro sistema.</p>
        <p>Estamos preparando todo para que tu estancia, expediciones y experiencias de spa sean inolvidables.</p>
        
        <div style="background-color: #1a1a1a; padding: 15px; margin: 20px 0; border-radius: 5px;">
            <p style="margin: 0; color: #fff;"><strong>Estado:</strong> Pagado y Confirmado ✅</p>
        </div>

        <p>Nos vemos pronto.</p>
        <a href="{{ url('/') }}" class="boton">Ir a mi cuenta</a>
    </div>
</body>
</html>