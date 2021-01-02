@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <div>
      <h1 class="text-2xl my-5"> Pedidos </h1>

    <table class="min-w-full table-auto">
      <thead class="justify-between">
        <tr class="bg-gray-800">
        
          <th class="px-16 py-2">
            <span class="text-gray-300">Cliente</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">persona_registra</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">estado</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">total</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">costo_envio</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">fecha_envio</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">fecha_recepcion</span>
          </th>
       
  
          <th class="px-16 py-2">
            <span class="text-gray-300"></span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-gray-200">
          @foreach ($pedidos as $pedido)
          <tr class="bg-white border-4 border-gray-200">
            <td>
              <span class="text-center ml-2 font-semibold">{{@$pedido->clientes->nombre}}</span>
            </td>
            <td class="px-16 py-2">
              <span>{{$pedido->persona_registra}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$pedido->estado}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$pedido->total}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$pedido->costo_envio}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$pedido->fecha_envio}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$pedido->fecha_recepcion}}</span>
            </td>
           
            <td class="px-16 py-2">
                <a href="{{''.$pedido->id}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                    Editar
                </a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    {{ $pedidos->links() }}
  </div>
  <a href="{{route('pedido.new')}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
    Nueva PEDIDO
</a>
</div>
@endsection