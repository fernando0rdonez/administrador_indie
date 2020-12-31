@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div>
    <table class="min-w-full table-auto">
      <thead class="justify-between">
        <tr class="bg-gray-800">
         
          <th class="px-16 py-2">
            <span class="text-gray-300">Nombre</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">ciudad</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Cédula</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Teléfono</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Dirección</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Última compra</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300"></span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-gray-200">
          @foreach ($clientes as $cliente)
          <tr class="bg-white border-4 border-gray-200">
           
            <td>
              <span class="text-center ml-2 font-semibold">{{$cliente->nombre}}</span>
            </td>
            <td class="px-16 py-2">
              <span>{{$cliente->ciudad}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$cliente->cedula}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$cliente->telefono}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$cliente->direccion}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$cliente->ultima_compra}}</span>
            </td>
            <td class="px-16 py-2">
                <a href="{{''.$cliente->id}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                    Editar
                </a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    {{ $clientes->links() }}
  </div>
  <a href="{{route('cliente.new')}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
    Nueva Modelo
</a>
</div>
@endsection