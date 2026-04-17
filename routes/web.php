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

Route::get('/', function () {
    return view('login');
});

use App\Http\Controllers\Admin\HabitacionController;

Route::prefix('admin')->group(function () {
    Route::resource('habitaciones', HabitacionController::class);
});