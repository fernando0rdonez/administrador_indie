<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class ClienteController extends Controller
{
    //

    public function show(Request $request, Cliente $cliente)
    {
        return view('Cliente.edit',['cliente'=>$cliente]);
    }
    public function index(Request $request)
    {
       
        $clientes = Cliente::paginate(15);
        return view('Cliente.index',['clientes'=>$clientes]);

    }

    public function new(Request $request)
    {
        return view('Cliente.new');
    }

    public function edit(Request $request, Cliente $cliente)
    {
        $validator = Validator::make($request->all(), [
            'nombre'         => 'required|string|max:50',            
            'ciudad'           => 'required|string|max:50',            
            'cedula'          => 'required|string|max:50',            
            'telefono'           => 'required|string|max:20',    
            'direccion'         => 'required|string|max:500',  
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $cliente->update($request->all());

        return back()->with('success', 'Reata creada exitosamente');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'         => 'required|string|max:50',            
            'ciudad'           => 'required|string|max:50',            
            'cedula'          => 'required|string|max:50',            
            'telefono'           => 'required|string|max:20',    
            'direccion'         => 'required|string|max:500',  
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $cliente = Cliente::create($request->all()); 

        return back()->with('success', 'Reata creada exitosamente');
    }
}
