<?php

use Illuminate\Support\Facades\Route;

// Ruta principal (cuando entran a hotel-therian.test/)
Route::get('/', function () {
    return view('login'); 
});

// Ruta del spa
Route::get('/spa', function () {
    return view('spa');
}); 

// Ruta de vinos
Route::get('/vinos', function () {
    return view('cata-vinos');
});

// Ruta de rutas (experiencias de exploración)
Route::get('/rutas', function () {
    return view('rutas');
});

Route::get('/destinos', function () {
    return view('destinos');
});

Route::get('/experiencias', function () {
    return view('experiencias');
});

Route::get('/galeria', function () {
    return view('galeria');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/spa', function () {
    return view('spa');
});

Route::get('/pago', function () {
    return view('pago');
});


use App\Http\Controllers\Admin\HabitacionController;
use App\Http\Controllers\Admin\VinoController;
use App\Http\Controllers\Admin\RutaController;

Route::middleware(['auth'])->group(function () {
    
    // Aquí adentro pones TODAS tus rutas del administrador
    Route::get('/admin/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones.index');
    Route::get('/admin/habitaciones/create', [HabitacionController::class, 'create'])->name('habitaciones.create');
    Route::post('/admin/habitaciones', [HabitacionController::class, 'store'])->name('habitaciones.store');
    Route::get('/admin/habitaciones/{id}/edit', [HabitacionController::class, 'edit'])->name('habitaciones.edit');
    Route::put('/admin/habitaciones/{id}', [HabitacionController::class, 'update'])->name('habitaciones.update');
    Route::delete('/admin/habitaciones/{id}', [HabitacionController::class, 'destroy'])->name('habitaciones.destroy');
    // Rutas del Spa
    Route::get('/admin/spa', [\App\Http\Controllers\Admin\InsumoController::class, 'index'])->name('spa.index');
    Route::get('/admin/spa/create', [\App\Http\Controllers\Admin\InsumoController::class, 'create'])->name('spa.create');
    Route::post('/admin/spa', [\App\Http\Controllers\Admin\InsumoController::class, 'store'])->name('spa.store');
    Route::get('/admin/spa/{id}/edit', [\App\Http\Controllers\Admin\InsumoController::class, 'edit'])->name('spa.edit');
    Route::put('/admin/spa/{id}', [\App\Http\Controllers\Admin\InsumoController::class, 'update'])->name('spa.update');
    Route::delete('/admin/spa/{id}', [\App\Http\Controllers\Admin\InsumoController::class, 'destroy'])->name('spa.destroy');
    // Rutas de Vinos
    Route::resource('/admin/vinos', VinoController::class)->names('vinos');
    // Rutas de Rutas
    Route::resource('/admin/rutas', RutaController::class)->names('rutas');

});

use App\Http\Controllers\AuthController;

// Ruta para mostrar la vista (GET)
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');

// Ruta para procesar los datos (POST) - AQUÍ ESTÁ EL FIX
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');

// Ruta para cerrar sesión
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el formulario de registro
Route::post('/register', [AuthController::class, 'register'])->name('register.post');