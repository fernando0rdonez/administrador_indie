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
        <form action="{{route('pedido.edit',['pedido' => $pedido->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div  class="col-span-6 sm:col-span-3" >
                <label  className="block text-sm font-medium text-gray-700">Cliente</label>
                  <input type="hidden" name="cliente_id" value={{$pedido->cliente_id}}   />
                  <input type="hidden" name="cliente"  value={{$pedido->clientes->nombre}}  />
                  <input type="hidden" id="comprobante_img"  value={{$pedido->comprobante}}  />
                  <input type="text" value={{$pedido->clientes->nombre}} name="search"  autoComplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> 

                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="persona_registra" class="block text-sm font-medium text-gray-700">persona_registra</label>
                  <input type="text" name="persona_registra" value="{{$pedido->persona_registra}}"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="observaciones" class="block text-sm font-medium text-gray-700">observaciones</label>
                  <input type="text" name="observaciones" value="{{$pedido->observaciones}}" autocomplete="color" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="fecha_envio" class="block text-sm font-medium text-gray-700">fecha_envio</label>
                    <input type="date" name="fecha_envio" value="{{$pedido->fecha_envio}}"  autocomplete="color" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <label for="costo_envio" class="block text-sm font-medium text-gray-700">Costo envio</label>
                    <input type="text" name="costo_envio" value="{{$pedido->costo_envio}}"  autocomplete="costo_envio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Comprobante pago</label>
                    <input type="file" name="foto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="col-span-6 sm:col-span-3">
                    <div id="verPrescripcion" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Ver comprobante
                    </div>
                  </div>
            </div>
            @foreach ($pedido->detalle as $item)
            <div class="flex flex-row">
                <div class="justify-items-center">
                    <img src={{$item->modelo->imagen}} class="w-20 h-20 rounded-full ">
                </div>
                 <input type="hidden" value={{$item->modelo->id}} name="modelo_id[]" class="col-span-1 m-1 border border-gray-400 rounded h-10" />
                 <input type="number"  value={{$item->talla}} placeholder="Talla" name="talla[]" class="col-span-1 m-1 border border-gray-400 rounded  h-10 w-20" />
                 <h1  class="col-span-1 m-1 border border-gray-400 h-10 w-20"> {{$item->modelo->nombre}} </h1>
                 <input type="number" value={{$item->cantidad}} placeholder="Cantidad" name="cantidad[]" class="col-span-1 m-1 border border-gray-400 rounded-sm h-10 w-20" />
                 <div class="rounded-md m-3 p-3 bg-green-500 cursor-pointer text-white  text-center">Min </div>
    
            </div>
            @endforeach
           <div id="detalle" class="w-full"></div>

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
<script>
  $("#verPrescripcion").click(function(){
    Swal.fire({
  title: 'Comprobante pago!',
  text: 'Verifique los datos.',
  imageUrl: 'http://127.0.0.1:8000'+$('#comprobante_img').val(),
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Comprobante',
})
});


</script>

  @endsection