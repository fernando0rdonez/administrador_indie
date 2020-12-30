<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reata extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'logo', 'color', 'code', 'imagen', 'tipo', 'genero'];
}
