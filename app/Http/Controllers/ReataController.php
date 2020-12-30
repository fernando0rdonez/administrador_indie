<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ReataController extends Controller
{
    //
    public function create(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'nombre'         => 'required|string|max:50',            
            'logo'           => 'required|string|max:50',            
            'color'          => 'required|string|max:50',            
            'code'           => 'string|max:20',    
            'imagen'         => 'string|max:500',  
            'tipo'           => 'required|in:CUERO,TELA,TUBULAR',
            'genero'         => 'required|in:HOMBRE,MUJER,UNISEX',
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $reata = Reata::create($request->all()); 
        if($request->file('foto')!=NULL){
            $image = $request->file('foto');
            $img =  Str::random(40).".".$request->file('foto')->extension();
            $image->move(public_path().'/images/reatas/',$img  );
            $url = '/images/reatas/'.$img;
            $reata->imagen = $url;
            $reata->save();
        }
       

        return back()->with('success', 'Reata creada exitosamente');

    }
    public function show(Request $request, Reata $reata)
    {
        return view('Reatas.edit',['reata'=>$reata]);
    }

    public function new(Request $request)
    {
        return view('Reatas.new');
    }

    public function edit(Request $request, Reata $reata)
    {
        $validator = Validator::make($request->all(), [
            'nombre'         => 'required|string|max:50',            
            'logo'           => 'required|string|max:50',            
            'color'          => 'required|string|max:50',            
            'code'           => 'string|max:20',    
            'tipo'           => 'required|in:CUERO,TELA,TUBULAR',
            'genero'         => 'required|in:HOMBRE,MUJER,UNISEX',
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $reata->update($request->all());

        if($request->file('foto')!=NULL){
            $image = $request->file('foto');
            $img =  Str::random(40).".".$request->file('foto')->extension();
            $image->move(public_path().'/images/reatas/',$img  );
            $url = '/images/reatas/'.$img;
            $reata->imagen = $url;
            $reata->save();
        }

        return back()->with('success', 'Reata editado exitosamente');
    }
    public function index(Request $request)
    {
        $usuario = 0;
        $reata = Reata::paginate(15);
        return view('Reatas.index',['reatas'=>$reata, 'usuario'=>$usuario]);
    }

}
