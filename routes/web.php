<?php

use Illuminate\Support\Facades\Route;

// Ruta principal (cuando entran a hotel-therian.test/)
Route::get('/', function () {
    // IMPORTANTE: Como tu archivo se llama Inicio.blade.php (con mayúscula),
    // debemos ponerlo exactamente igual aquí.
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

Route::middleware(['auth'])->group(function () {
    
    // Aquí adentro pones TODAS tus rutas del administrador
    Route::get('/admin/habitaciones', [HabitacionController::class, 'index'])->name('habitaciones.index');
    Route::get('/admin/habitaciones/create', [HabitacionController::class, 'create'])->name('habitaciones.create');
    Route::post('/admin/habitaciones', [HabitacionController::class, 'store'])->name('habitaciones.store');
    Route::get('/admin/habitaciones/{id}/edit', [HabitacionController::class, 'edit'])->name('habitaciones.edit');
    Route::put('/admin/habitaciones/{id}', [HabitacionController::class, 'update'])->name('habitaciones.update');
    Route::delete('/admin/habitaciones/{id}', [HabitacionController::class, 'destroy'])->name('habitaciones.destroy');

});

use App\Http\Controllers\AuthController;

// Rutas para procesar los datos de los formularios
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');
Route::post('/login-post', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');