@extends('layouts.app')


       
@section('content')
@if(session('success'))
<div class="bg-indigo-600">
  <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between flex-wrap">
      <div class="w-0 flex-1 flex items-center">
        <span class="flex p-2 rounded-lg bg-indigo-800">
          <!-- Heroicon name: speakerphone -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
          </svg>
        </span>
        <p class="ml-3 font-medium text-white truncate">
          <span class="md:hidden">
           Buenas noticias!
          </span>
          <span class="hidden md:inline">
          {{session('success')}}
          </span>
        </p>
      </div>
      <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
       
      </div>
      <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
        <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
          <span class="sr-only">Dismiss</span>
          <!-- Heroicon name: x -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
@endif
@if ($errors->any())
<div class="bg-red-600">
  <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between flex-wrap">
      <div class="w-0 flex-1 flex items-center">
        <span class="flex p-2 rounded-lg bg-red-800">
          <!-- Heroicon name: speakerphone -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
          </svg>
        </span>
        {!! implode('', $errors->all('
          <p class="ml-3 font-medium text-white truncate">
          <span class="md:hidden">
           Malas noticias!
          </span>
          <span class="hidden md:inline">
          :message
          </span>
        </p>')) !!}
       
      </div>
      <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
       
      </div>
      <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
        <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
          <span class="sr-only">Dismiss</span>
          <!-- Heroicon name: x -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
@endif

<div class="container mx-auto">
 
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="mt-1 md:mt-0">
          <img src="{{$modelo->imagen}}"  class="object-contain h-72 w-full" alt="">
        </div>
        <form action="{{route('modelo.edit',['modelo' => $modelo->id])}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                  <input type="text" name="nombre" value="{{$modelo->nombre}}"  autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="superficie" class="block text-sm font-medium text-gray-700">superficie</label>
                  <input type="text" name="superficie" value="{{$modelo->superficie}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="valor" class="block text-sm font-medium text-gray-700">valor</label>
                  <input type="text" name="valor" value="{{$modelo->valor}}"  autocomplete="costo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                    <input type="text" name="codigo" value="{{$modelo->codigo}}" autocomplete="costo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="costo" class="block text-sm font-medium text-gray-700">Costo</label>
                    <input type="text" name="costo" value="{{$modelo->costo}}" autocomplete="costo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="keywords" class="block text-sm font-medium text-gray-700">Keywords</label>
                    <input type="text" name="keywords" value="{{$modelo->keywords}}" autocomplete="costo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" name="foto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                  <select id="tipo" name="tipo" autocomplete="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="EVAFOMIX" {{$modelo->tipo == 'EVAFOMIX' ? 'selected': ''}}>EVAFOMIX</option>
                    <option value="TELA" {{$modelo->tipo == 'TELA' ? 'selected': ''}}>TELA</option>
                    <option value="CORRUGADO" {{$modelo->tipo == 'CORRUGADO' ? 'selected': ''}}>CORRUGADO</option>
                 
                  </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="eva" class="block text-sm font-medium text-gray-700">EVA</label>
                    <select id="eva" name="eva" autocomplete="eva" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="BLANCA" {{$modelo->eva == 'BLANCA' ? 'selected': ''}}>BLANCA</option>
                      <option value="NEGRA" {{$modelo->eva == 'NEGRA' ? 'selected': ''}}>NEGRA</option>
                      <option value="CAFE" {{$modelo->eva == 'CAFE' ? 'selected': ''}}>CAFE</option>
                    </select>
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="fibra" class="block text-sm font-medium text-gray-700">Fibra</label>
                    <select id="fibra" name="fibra" autocomplete="eva" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="VAGE" {{$modelo->fibra == 'VAGE' ? 'selected': ''}}>VAGE</option>
                      <option value="NEGRA" {{$modelo->fibra == 'NEGRA' ? 'selected': ''}}>NEGRA</option>
                      <option value="CAFE" {{$modelo->fibra == 'CAFE' ? 'selected': ''}}>CAFE</option>
                    </select>
                  </div>
  
                <div class="col-span-6 sm:col-span-3">
                    <label for="genero" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select id="genero" name="genero" autocomplete="genero" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="HOMBRE" {{$modelo->genero == 'HOMBRE' ? 'selected': ''}}>HOMBRE</option>
                        <option value="MUJER" {{$modelo->genero == 'MUJER' ? 'selected': ''}}>MUJER</option>
                        <option value="UNISEX" {{$modelo->genero == 'UNISEX' ? 'selected': ''}}>UNISEX</option>
                    </select>
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="reata_id" class="block text-sm font-medium text-gray-700">Reata</label>
                    <select id="reata_id" name="reata_id" autocomplete="reata_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option></option>
                        @foreach ($reatas as $reata)
                          <option value="{{$reata->id}}" {{$reata->id == $modelo->reata_id ? 'selected': ''}}>{{$reata->nombre}}</option>
                        @endforeach
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