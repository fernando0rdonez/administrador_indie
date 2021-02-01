@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <h1 class="text-2xl my-5"> Modelos </h1>

    <div class="container">
    <table class="w-full text-md bg-white flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
      <thead class="text-white">
        <tr class="bg-gray-800 bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
          <th class="p-3 text-left">
            <span class="text-gray-300"></span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Nombre</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Codigo</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Reata</span>
          </th>

          <th class="p-3 text-left">
            <span class="text-gray-300">Tipo</span>
          </th>

          <th class="p-3 text-left">
            <span class="text-gray-300">Eva</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Fibra</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Genero</span>
          </th>
  
          <th class="p-3 text-left">
            <span class="text-gray-300"></span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-gray-200 flex-1 sm:flex-none">
          @foreach ($modelos as $modelo)
          <tr class="bg-white border-4 border-gray-200 flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
            <td class="border-grey-light border hover:bg-gray-100 p-3 items-center">
            <a href="{{'/modelo/'.$modelo->id}}">   <img
                class="h-12 w-12 rounded-full object-cover "
                src="{{asset(isset($modelo->imagen)? $modelo->imagen : '' )}}"
                alt=""
              /></a>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
            <a href="{{'/modelo/'.$modelo->id}}"> <span class="text-center ml-2 font-semibold">{{$modelo->nombre}}</span></a>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
              <span>{{$modelo->codigo}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$modelo->reata->nombre}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$modelo->tipo}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$modelo->eva}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$modelo->fibra}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$modelo->genero}}</span>
            </td>
           
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <a href="{{'/modelo/'.$modelo->id}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                    Editar
                </a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    {{ $modelos->links() }}
  </div>
  <a href="{{route('modelo.new')}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
    Nueva Modelo
</a>
</div>
@endsection