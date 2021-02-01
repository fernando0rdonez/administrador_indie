@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        Ocurrió un error
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
@endif

<div class="container mx-auto">
 
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('pedido.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div id="cliente" class="col-span-6 sm:col-span-3" ></div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="persona_registra" class="block text-sm font-medium text-gray-700">persona_registra</label>
                  <input type="text" required name="persona_registra"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="observaciones" class="block text-sm font-medium text-gray-700">observaciones</label>
                  <input type="text"  required name="observaciones"  autocomplete="color" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="fecha_envio" class="block text-sm font-medium text-gray-700">fecha_envio</label>
                    <input type="date" required name="fecha_envio"  autocomplete="color" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="costo_envio" class="block text-sm font-medium text-gray-700">Costo envio</label>
                    <input type="text" required name="costo_envio"  autocomplete="costo_envio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Comprobante pago</label>
                    <input type="file" name="foto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
            </div>
           <div id="detalle" class="w-full"></div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection