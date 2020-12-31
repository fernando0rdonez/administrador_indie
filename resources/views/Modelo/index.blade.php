@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <div>
    <table class="min-w-full table-auto">
      <thead class="justify-between">
        <tr class="bg-gray-800">
          <th class="px-16 py-2">
            <span class="text-gray-300"></span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Nombre</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">superficie</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Reata</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">Tipo</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">Eva</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Fibra</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Genero</span>
          </th>
  
          <th class="px-16 py-2">
            <span class="text-gray-300"></span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-gray-200">
          @foreach ($modelos as $modelo)
          <tr class="bg-white border-4 border-gray-200">
            <td class="px-16 py-2 flex flex-row items-center">
              <img
                class="h-8 w-8 rounded-full object-cover "
                src="{{asset(isset($modelo->imagen)? $modelo->imagen : '' )}}"
                alt=""
              />
            </td>
            <td>
              <span class="text-center ml-2 font-semibold">{{$modelo->nombre}}</span>
            </td>
            <td class="px-16 py-2">
              <span>{{$modelo->superficie}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$modelo->reata->nombre}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$modelo->tipo}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$modelo->eva}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$modelo->fibra}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$modelo->genero}}</span>
            </td>
           
            <td class="px-16 py-2">
                <a href="{{''.$modelo->id}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
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