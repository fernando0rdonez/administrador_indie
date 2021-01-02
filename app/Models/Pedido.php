<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'persona_registra', 'cliente_id','cliente' ,'observaciones', 'fecha_envio', 'estado', 'comprobante', 'total', 'costo_envio', 'fecha_recepcion'];


    public function detalle()
    {
        return $this->hasMany('App\Models\DetallePedido');
    }
    public function clientes (){
        return $this->hasOne('App\Models\Cliente', 'id','cliente_id');

    }
}
