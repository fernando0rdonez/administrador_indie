<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $fillable = ['pedido_id', 'modelo_id', 'talla','cantidad' ,'observaciones', 'opciones'];


    public function modelo (){
        return $this->hasOne('App\Models\Modelo', 'id','modelo_id');
    }
    
}
