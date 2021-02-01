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
        <form action="{{route('reata.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                  <input type="text" required name="nombre"  autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                  <input type="text" name="logo"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                  <input type="text" required name="color"  autocomplete="color" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" name="foto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                  <select id="tipo" name="tipo" autocomplete="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="CUERO">CUERO</option>
                    <option value="TELA">TELA</option>
                    <option value="TUBULAR">TUBULAR</option>
                  </select>
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                    <label for="genero" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select id="genero" name="genero" autocomplete="genero" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="HOMBRE">HOMBRE</option>
                        <option value="MUJER">MUJER</option>
                        <option value="UNISEX">UNISEX</option>
                    </select>
                  </div>
              </div>
            </div>
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