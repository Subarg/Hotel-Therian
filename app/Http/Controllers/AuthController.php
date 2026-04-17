<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Importamos el modelo de Usuario
use Illuminate\Support\Facades\Auth; // Maneja las sesiones
use Illuminate\Support\Facades\Hash; // Encripta las contraseñas

class AuthController extends Controller
{
    // FUNCIÓN PARA REGISTRAR
    public function register(Request $request)
{
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

    // FUNCIÓN PARA INICIAR SESIÓN
    public function login(Request $request)
    {
        $credentials = [
            'usuario' => $request->email, 
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('/admin/habitaciones');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');
    }
}