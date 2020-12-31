<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'superficie', 'reata_id', 'tipo', 'eva', 'fibra', 'genero', 'imagen', 'costo','valor','keywords'];


    public function reata (){
        return $this->hasOne('App\Models\Reata', 'id','reata_id');
    }
}
