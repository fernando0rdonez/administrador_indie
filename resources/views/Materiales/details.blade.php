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

                <div class="col-span-6 sm:col-span-3">
                    <span class="text-regular text-right">Total Mujeres: {{$mujeres->sum('cantidad')}} </span><br>
                    <span class="text-regular text-right">Total Hombre: {{$hombres->sum('cantidad')}} </span><br>
                    <span class="text-lg font-strong">------------------- </span><br>
                    <span class="text-lg font-strong">Total Pares: {{$mujeres->sum('cantidad') + $hombres->sum('cantidad')}} </span>

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
  imageUrl: 'http://34.72.134.255/'+$('#comprobante_img').val(),
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Comprobante',
})
});


</script>

  @endsection