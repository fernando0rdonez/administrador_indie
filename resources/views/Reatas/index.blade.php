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
            <span class="text-gray-300">Logo</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Color</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">Tipo</span>
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
          @foreach ($reatas as $reata)
          <tr class="bg-white border-4 border-gray-200">
            <td class="px-16 py-2 flex flex-row items-center">
              <img
                class="h-8 w-8 rounded-full object-cover "
                src="{{asset(isset($reata->imagen)? $reata->imagen : '' )}}"
                alt=""
              />
            </td>
            <td>
              <span class="text-center ml-2 font-semibold">{{$reata->nombre}}</span>
            </td>
            <td class="px-16 py-2">
              <span>{{$reata->logo}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$reata->color}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$reata->tipo}}</span>
            </td>
            <td class="px-16 py-2">
                <span>{{$reata->genero}}</span>
            </td>
            <td class="px-16 py-2">
                <a href="{{''.$reata->id}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                    editar
                </a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    {{ $reatas->links() }}
  </div>
  <a href="{{route('reata.new')}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
    Nueva reata
</a>
</div>
@endsection