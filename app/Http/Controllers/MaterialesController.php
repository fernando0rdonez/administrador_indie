<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Pedido;
use App\Models\DetallePedido;



class MaterialesController extends Controller
{
   

    public function materiales(Request $request)
    {
        $date = Carbon::parse(Carbon::now())->format('Y-m-d'); 

        if ($request->has('date')) {
           $date =  $request->date;
        }
        $pedidos =  Pedido::where('fecha_envio', $date )->whereIn('estado', ['PAGADA', 'PEDIDO'])->get()->pluck('id');

        $detallePedido = DetallePedido::WhereIn('pedido_id',$pedidos)->get();

        $hombres = $detallePedido->filter(function ($detalle, $key) {
            return $detalle->modelo->genero === 'HOMBRE';
        });
        $mujeres = $detallePedido->filter(function ($detalle, $key) {
            return $detalle->modelo->genero === 'MUJER';
        });
        $reatas = $detallePedido->groupBy(function ($item, $key) {
            return $item->modelo->reata_id;
        });
        $reatas_mujeres = $mujeres->groupBy(function ($item, $key) {
            return $item->modelo->reata_id;
        });
        $reatas_hombre = $hombres->groupBy(function ($item, $key) {
            return $item->modelo->reata_id;
        });
        $superficie = $detallePedido->groupBy(function ($item, $key) {
            return $item->modelo->superficie;
        });
        $tallasMujer = $mujeres->groupBy(function ($item, $key) {
                    return $item->talla;
        });
        $tallasHombre = $hombres->groupBy(function ($item, $key) {
            return $item->talla;
        });
     
    
        return view('Materiales.index',['pedidos'=>$detallePedido, 'tallasHombre'=>$tallasHombre,'tallasMujer'=>$tallasMujer, 'reatas'=>$reatas,'reatas_hombre'=>$reatas_hombre,'reatas_mujer'=>$reatas_mujeres, 'superficie'=>$superficie]);
    }
    public function detalle(Request $request)
    {
        $date = Carbon::parse(Carbon::now())->format('Y-m-d'); 

        if ($request->has('date')) {
           $date =  $request->date;
        }
        
        $pedidos =  Pedido::where('fecha_envio', $date )->whereIn('estado', ['PAGADA', 'PEDIDO'])->get()->pluck('id');
        $detallePedido = DetallePedido::WhereIn('pedido_id',$pedidos)->get();

        $hombres = $detallePedido->filter(function ($detalle, $key) {
            return $detalle->modelo->genero === 'HOMBRE';
        });
        $mujeres = $detallePedido->filter(function ($detalle, $key) {
            return $detalle->modelo->genero === 'MUJER';
        });
        $grouped = $detallePedido->groupBy(function ($detalle, $key) {
            return $detalle->modelo_id;

        });
        
        return view('Materiales.details',['modelos'=>$grouped, 'hombres'=>$hombres, 'mujeres'=>$mujeres]);


    }
}
