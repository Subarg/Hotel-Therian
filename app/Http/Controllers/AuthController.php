<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        // 1. REGISTRO LIMPIO: Ya no pide reCAPTCHA, solo los datos básicos.
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|string|email|max:50|unique:usuarios,usuario',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'usuario' => $request->email, 
            'password' => Hash::make($request->password),
            'rol_id' => 2, 
        ]);

        Auth::login($user);

        return redirect()->to('/');
    }

    public function showLogin()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        // 2. LOGIN BLINDADO: Ahora la validación de reCAPTCHA vive aquí.
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            
            // Verificamos con Google antes de intentar iniciar sesión
            'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) {
                $respuesta = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $value,
                    'remoteip' => request()->ip()
                ]);

                if (! $respuesta->json('success')) {
                    $fail('La validación de reCAPTCHA ha fallado. Por favor, comprueba que no eres un robot.');
                }
            }],
        ], [
            'g-recaptcha-response.required' => 'Debes confirmar que no eres un robot para iniciar sesión.'
        ]);

        // Si es humano, procedemos a intentar iniciar sesión
        $credentials = ['usuario' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirección inteligente por Rol
            return match($user->rol_id) {
                1 => redirect()->to('/admin/habitaciones'),
                3 => redirect()->to('/admin/spa'),
                4 => redirect()->to('/admin/rutas'),
                5 => redirect()->to('/admin/vinos'),
                default => redirect()->to('/inicio'),
            };
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');
    }
}