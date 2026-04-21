<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vino extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio'];
}
