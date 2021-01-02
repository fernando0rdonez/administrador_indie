<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;


class PedidoController extends Controller
{
    public function new(Request $request)
    {
        return view('Pedido.new');
    }
    public function show(Request $request, Pedido $pedido)
    {
        return view('Pedido.edit',['pedido'=>$pedido]);
    }
  
    public function index(Request $request)
    {
        $query =  Pedido::whereNotNull('id');
        if ($request->has('search')) {
            $query->where('cliente', 'LIKE', '%'.$request->search.'%');
            $query->where('persona_registra', 'LIKE', '%'.$request->search.'%');
            $query->where('fecha_recepcion', 'LIKE', $request->search.'%');
            $query->where('fecha_envio', 'LIKE', $request->search.'%');
        }

        if ($request->has('precio')) {
            $query->where('total', '=', $request->precio);
        }
        $pedidos = $query->paginate(15);
        return view('Pedido.index',['pedidos'=>$pedidos]);
    }
    //
    public function create(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'cliente'             => 'required|string|max:50',            
            'persona_registra'    => 'required|string|max:50',            
            'observaciones'       => 'string|max:50',            
            'fecha_envio'         => 'required|date',            
            'cliente_id'          => 'integer',  
            'modelo_id'           => 'required|array',
            'modelo_id.*'         => 'required|integer|min:0',
            'talla'               => 'required|array',
            'talla.*'             => 'required|integer|min:0',
            'cantidad'            => 'required|array',
            'cantidad.*'          => 'required|integer|min:0',

        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $fecha_r = Carbon::parse(Carbon::now())->format('Y-m-d'); 

       
        $pedido = Pedido::create($request->all()); 
        $pedido->fecha_recepcion = $fecha_r;
       

        $modelos = $request->input('modelo_id');
        $talla = $request->input('talla');
        $cantidad = $request->input('cantidad');
        $total = 0;
        foreach ( $modelos as $key => $value) {
           $detallePedido = new DetallePedido();
           $detallePedido->pedido_id =  $pedido->id;
           $detallePedido->modelo_id =  $modelos[$key];
           $detallePedido->talla     =  $talla[$key];
           $detallePedido->cantidad  =  $cantidad[$key];
           $detallePedido->save();
           $total =  $total + ($detallePedido->cantidad  * $detallePedido->modelo->valor);
        }
        $pedido->total = $total;
        $pedido->save();

        if($request->file('foto')!=NULL){
            $image = $request->file('foto');
            $img =  Str::random(40).".".$request->file('foto')->extension();
            $image->move(public_path().'/images/comprobantes/',$img  );
            $url = '/images/comprobantes/'.$img;
            $pedido->comprobante = $url;
            $pedido->save();
        }

        return back()->with('success', 'Pedido creado exitosamente');
    }
    public function edit(Request $request, Pedido $pedido)
    {
      
        $validator = Validator::make($request->all(), [
            'cliente'             => 'required|string|max:50',            
            'persona_registra'    => 'required|string|max:50',            
            'observaciones'       => 'string|max:50',            
            'fecha_envio'         => 'required|date',            
            'cliente_id'          => 'integer',  
            'modelo_id'           => 'required|array',
            'modelo_id.*'         => 'required|integer|min:0',
            'talla'               => 'required|array',
            'talla.*'             => 'required|integer|min:0',
            'cantidad'            => 'required|array',
            'cantidad.*'          => 'required|integer|min:0',

        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

       
        $pedido->update($request->all());

       

        $modelos = $request->input('modelo_id');
        $talla = $request->input('talla');
        $cantidad = $request->input('cantidad');
        $total = 0;
        $olds = DetallePedido::where('pedido_id', $pedido->id)->get();
       foreach ($olds as $key => $value) {
           DetallePedido::find($value->id)->delete();
       }
       
        foreach ( $modelos as $key => $value) {
           $detallePedido = new DetallePedido();
           $detallePedido->pedido_id =  $pedido->id;
           $detallePedido->modelo_id =  $modelos[$key];
           $detallePedido->talla     =  $talla[$key];
           $detallePedido->cantidad  =  $cantidad[$key];
           $detallePedido->save();
           $total =  $total + ($detallePedido->cantidad  * $detallePedido->modelo->valor);
        }
        $pedido->total = $total;
        $pedido->save();

        if($request->file('foto')!=NULL){
            $image = $request->file('foto');
            $img =  Str::random(40).".".$request->file('foto')->extension();
            $image->move(public_path().'/images/comprobantes/',$img  );
            $url = '/images/comprobantes/'.$img;
            $pedido->comprobante = $url;
            $pedido->save();
        }

        return back()->with('success', 'Pedido creado exitosamente');
    }
}
