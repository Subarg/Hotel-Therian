<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
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
    public function showLogin()
    {
        return view('login'); 
    }
public function login(Request $request)
{
    $credentials = ['usuario' => $request->email, 'password' => $request->password];

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        // Redirección inteligente por Rol
        return match($user->rol_id) {
            1 => redirect()->to('/admin/habitaciones'), // Super Admin
            3 => redirect()->to('/admin/spa'),          // Encargado Spa
            4 => redirect()->to('/admin/expediciones'), // Encargado Expediciones
            5 => redirect()->to('/admin/vinos'),        // Encargado Vinos
            default => redirect()->to('/inicio'),             // Clientes (Rol 2)
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