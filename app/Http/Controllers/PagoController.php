<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservaConfirmada;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    public function procesarPago(Request $request)
    {
        // 1. Autenticamos con tu llave secreta
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $carrito = $request->carrito;
        $lineItems = [];

        // 2. Empaquetamos lo que el cliente va a comprar
        foreach ($carrito as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'mxn',
                    'product_data' => [
                        'name' => $item['name'] ?? 'Servicio Hotel Therian',
                        'description' => $item['details'] ?? '',
                    ],
                    // Multiplicamos por 100 porque Stripe lee en centavos ($1500.00 = 150000)
                    'unit_amount' => (int) round($item['amount'] * 100),
                ],
                'quantity' => 1,
            ];
        }

        // 3. Creamos la sesión de pago segura
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('pago.exito'),
            'cancel_url' => url('/inicio'), // Si el cliente se arrepiente, lo regresamos
        ]);

        // 4. Devolvemos la URL secreta de Stripe para que el frontend redirija
        return response()->json(['url' => $session->url]);
    }

    public function pagoExitoso()
    {
        try {
            // Intentamos enviar el correo a la fuerza
            \Illuminate\Support\Facades\Mail::to('angelemma865@gmail.com')
                ->send(new \App\Mail\ReservaConfirmada());
                
        } catch (\Exception $e) {
            // Si algo sale mal, detenemos la página y mostramos el error exacto en pantalla
            dd("Error de correo: " . $e->getMessage());
        }

        // Si pasó el try sin problemas, mostramos el éxito
        return view('cliente.pago_exito');
    }
}