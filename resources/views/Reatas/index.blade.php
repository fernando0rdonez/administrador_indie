@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <h1 class="text-2xl my-5"> Reatas </h1>

    <div>
    <table class="w-full flex-1 sm:flex-none flex-row flex-no-wrap  sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
      <thead class="jtext-white">
        <tr class="bg-gray-800 bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
          <th class="p-3 text-left">
            <span class="text-gray-300"></span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Nombre</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Logo</span>
          </th>
          <th class="p-3 text-left">
            <span class="text-gray-300">Color</span>
          </th>

          <th class="p-3 text-left">
            <span class="text-gray-300">Tipo</span>
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
          @foreach ($reatas as $reata)
          <tr class="bg-white border-4 border-gray-200 flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
            <td class=" border-grey-light border hover:bg-gray-100 p-3 items-center">
              <img
                class="h-8 w-8 rounded-full object-cover "
                src="{{asset(isset($reata->imagen)? $reata->imagen : '' )}}"
                alt=""
              />
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3"> 
              <span class="text-center ml-2 font-semibold">{{$reata->nombre}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
              <span>{{$reata->logo}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$reata->color}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$reata->tipo}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <span>{{$reata->genero}}</span>
            </td>
            <td class="border-grey-light border hover:bg-gray-100 p-3">
                <a href="{{'/reata/'.$reata->id}}" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
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