<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Reata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ModeloController extends Controller
{
    //
    public function show(Request $request, Modelo $modelo)
    {
        $reatas = Reata::all();
        return view('Modelo.edit',['modelo'=>$modelo,'reatas'=>$reatas]);
    }

    public function new(Request $request)
    {
        $reatas = Reata::all();
        return view('Modelo.new',['reatas'=>$reatas]);

    }
    public function index(Request $request)
    {
        $modelos = Modelo::paginate(15);
        return view('Modelo.index',['modelos'=>$modelos]);
    }
    public function edit(Request $request, Modelo $modelo)
    {
        $validator = Validator::make($request->all(), [
            'nombre'         => 'required|string|max:50',            
            'superficie'     => 'required|string|max:50',            
            'costo'          => 'required',            
            'valor'          => 'required',            
            'keywords'       => 'string|max:50',            
            'reata_id'       => 'required',            
            'tipo'           => 'required|in:EVAFOMIX,TELA,CORRUGADO',
            'eva'            => 'required|in:BLANCA,NEGRA,CAFE',
            'fibra'          => 'required|in:VAGE,NEGRA,CAFE',
            'genero'         => 'required|in:HOMBRE,MUJER,UNISEX',
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $modelo->update($request->all());

        if($request->file('foto')!=NULL){
            $image = $request->file('foto');
            $img =  Str::random(40).".".$request->file('foto')->extension();
            $image->move(public_path().'/images/modelos/',$img  );
            $url = '/images/modelos/'.$img;
            $modelo->imagen = $url;
            $modelo->save();
        }

        return back()->with('success', 'Modelo editado exitosamente');
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre'         => 'required|string|max:50',            
            'superficie'     => 'required|string|max:50',            
            'costo'          => 'required',            
            'valor'          => 'required',            
            'keywords'       => 'string|max:50',            
            'reata_id'       => 'required',            
            'tipo'           => 'required|in:EVAFOMIX,TELA,CORRUGADO',
            'eva'            => 'required|in:BLANCA,NEGRA,CAFE',
            'fibra'          => 'required|in:VAGE,NEGRA,CAFE',
            'genero'         => 'required|in:HOMBRE,MUJER,UNISEX',
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $modelo = Modelo::create($request->all()); 
        if($request->file('foto')!=NULL){
            $image = $request->file('foto');
            $img =  Str::random(40).".".$request->file('foto')->extension();
            $image->move(public_path().'/images/modelos/',$img  );
            $url = '/images/modelos/'.$img;
            $modelo->imagen = $url;
            $modelo->save();
        }
       

        return back()->with('success', 'Modelo creada exitosamente');

    }
}
