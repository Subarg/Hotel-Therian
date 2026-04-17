<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insumo;

class InsumoController extends Controller
{
    public function index()
    {
        // Traemos solo los insumos que pertenecen al Spa
        $insumos = Insumo::where('categoria', 'Spa')->get();
        
        return view('admin.spa.index', compact('insumos'));
    }
}