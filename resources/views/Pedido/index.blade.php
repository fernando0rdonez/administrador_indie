@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <div class="px-2 py-2 flex flex-col justify-center">
        <div class="grid grid-cols-3">
            <div class="mt-5 md:mt-0 col-span-3 md:col-span-1">
                <h1 class="text-2xl my-5"> Pedidos </h1>
            </div>
            <div class="mt-5 md:mt-0 col-span-3 md:col-span-2 flex justify-end content-center">
                <form action="{{route('pedido.index')}}" method="get">
                  <input type="search" placeholder="Buscar" class="rounded p-1 m-4" name="search" id="">
                </form>
            </div>
        </div>

      <div>
        

    <table class="w-full text-md bg-white shadow-md rounded mb-4">
      <thead class="text-white">
        <tr class="bg-gray-800 bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
        
          <th class="p-3 text-left">
            <span class="text-gray-300">Cliente</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">persona_registra</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">estado</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">total</span>
          </th>

          <th class="p-3 text-left">
            <span class="text-gray-300">costo_envio</span>
          </th>

          <th class="p-3 text-left">
            <span class="text-gray-300">fecha_envio</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">fecha_recepcion</span>
          </th>

  
          <th class="p-3 text-left">
            <span class="text-gray-300"></span>
          </th>
        </tr>
      </thead>

      <tbody class="bg-gray-200 flex-1 sm:flex-none">
          @foreach ($pedidos as $pedido)
          <tr class="bg-white border-4 border-gray-200 flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
          
            <td class="border-grey-light border hover:bg-gray-100 p-3">
            <a href="{{'/pedido/'.$pedido->id}}" > <span class="text-center ml-2 font-semibold">{{@$pedido->clientes->nombre}}</span></a>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
              <span>{{$pedido->persona_registra}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$pedido->estado}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>$ {{$pedido->total}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>$ {{$pedido->costo_envio}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$pedido->fecha_envio}}</span>
            </td>
           <td class="border-grey-light border hover:bg-gray-100 p-3">
                 <form action="{{route('pedido.update',['pedido' => $pedido->id])}}" method="GET" enctype="multipart/form-data">
                  @csrf
                  <input  type="hidden" name="pedido" value="{{$pedido->id}}" >
                    <button class="bg-green-500 text-white px-4 py-1 border rounded-md hover:bg-white  hover:text-black " type="submit">Marcar como enviada </button>
                 </form> 
            </td>
           
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <a href="{{'/pedido/'.$pedido->id}}" class="bg-indigo-500 text-white px-4 py-1 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                    Editar
                </a>
              </td>

          </tr>

          @endforeach
      </tbody>
    </table>

    </div>


    {{ $pedidos->links() }}
  </div>
  <a href="{{route('pedido.new')}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
    Nueva PEDIDO
</a>
</div>

@endsection