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
 
    <div class="md:grid md:grid-cols-3 md:gap-6 ">
      <div class="mt-5 md:mt-0 md:col-span-3">
            <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div  class="col-span-6 sm:col-span-3" >
                <label  className="block text-sm font-medium text-gray-700">Cliente</label>
                 
                  <input type="text" readonly value={{$pedido->clientes->nombre}} name="search"  autoComplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled> 

                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="persona_registra" class="block text-sm font-medium text-gray-700">persona_registra</label>
                  <input type="text" readonly name="persona_registra" value="{{$pedido->persona_registra}}"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="observaciones" class="block text-sm font-medium text-gray-700">observaciones</label>
                  <input type="text"  readonly name="observaciones" value="{{$pedido->observaciones}}" autocomplete="color" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="fecha_envio" class="block text-sm font-medium text-gray-700">fecha_envio</label>
                    <input type="date" readonly name="fecha_envio" value="{{$pedido->fecha_envio}}"  autocomplete="color" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="costo_envio" class="block text-sm font-medium text-gray-700">Costo envio</label>
                    <input type="text" readonly name="costo_envio" value="{{$pedido->costo_envio}}"  autocomplete="costo_envio" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3">
                <span class="text-regular ">Datos de envio </span><br>
               Nombre : {{$pedido->clientes->nombre}}<br>
               Cedula : {{$pedido->clientes->cedula}}<br>
               Teléfono : {{$pedido->clientes->telefono}}<br>
               Ciudad : {{$pedido->clientes->ciudad}}
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <span class="text-regular text-right">Total Mujeres: {{$mujeres->sum('cantidad')}} </span><br>
                    <span class="text-regular text-right">Total Hombre: {{$hombres->sum('cantidad')}} </span><br>
                    <span class="text-lg font-strong">------------------- </span><br>
                    <span class="text-lg font-strong">Total Pares: {{$mujeres->sum('cantidad') + $hombres->sum('cantidad')}} </span>

                </div>
               
                  <div class="col-span-6 sm:col-span-3">
                    <div id="verPrescripcion" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Ver comprobante
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-1 lg:-mx-4">

            @foreach ($modelos as $item)
            <!-- Column -->
                <div class="my-1 px-1 w-1/2  md:w-1/3 lg:my-4 lg:px-4 lg:w-1/4">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">
                            <img alt="Placeholder" class="block h-32 w-full" src="{{$item[0]->modelo->imagen}}">
 
                        <header class="flex items-center justify-start leading-tight p-2 md:p-4">
                        @foreach ($item as $modelo)
                        <div class="border p-1">
                        <span class=" text-regular"> <i class="fas fa-shoe-prints fill-current"></i>: {{$modelo->talla}}</span><br>
                        <span class="text-regular"><i class="fab fa-cuttlefish"></i>: {{$modelo->cantidad}}</span>
                        </div>
                            
                        @endforeach
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-black" href="#">
                                <p class="ml-2 text-sm">
                                Código: {{$item[0]->modelo->codigo}}
                                </p>
                            </a>
                        </footer>
                    </article>
                    <!-- END Article -->
                </div>
            <!-- END Column -->
            @endforeach
            </div>
          </div>
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