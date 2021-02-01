@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <h1 class="text-2xl my-5"> Clientes </h1>

    <div>
    <table class="w-full text-md bg-white shadow-md rounded mb-4">
      <thead class="text-white">
        <tr class="bg-gray-800 bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
         
          <th class="p-3 text-left">
            <span class="text-gray-300">Nombre</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">ciudad</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Cédula</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Teléfono</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Dirección</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Última compra</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300"></span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-gray-200 flex-1 sm:flex-none">
          @foreach ($clientes as $cliente)
          <tr class="bg-white border-4 border-gray-200 flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
           
            <td class="border-grey-light border hover:bg-gray-100 p-3">
              <span class="text-center ml-2 font-semibold">{{$cliente->nombre}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
              <span>{{$cliente->ciudad}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$cliente->cedula}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$cliente->telefono}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$cliente->direccion}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$cliente->ultima_compra}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <a href="{{'/cliente/'.$cliente->id}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
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
    Nueva Cliente
</a>
</div>
@endsection