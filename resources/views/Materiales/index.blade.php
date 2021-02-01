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

<div class="container">
 
<div class="flex  bg-white flex-wrap items-center justify-center pt-0">

                    <form class="px-20 py-4" action="{{route('pedido.materiales')}}" method="GET" >
                                <label for="date" class="block text-sm font-medium text-gray-700">Fecha envio Materiales</label>
                                <input type="date" required  name="date" value=""  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Consultar material
                                </button>
                    </form>
                

                 <form class="px-20 py-4" action="{{route('pedido.detalle')}}" method="GET" >
                                <label for="date" class="block text-sm font-medium text-gray-700">Fecha envio Detalle </label>
                                <input type="date" required  name="date" value=""  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Consultar detalle
                                </button>
                    </form>

</div>
<!-- -->
<div  class="flex  bg-white flex-wrap items-center justify-center pt-0">
<div class="w-full p-4 plan-card">
                   <label  className="block text-2xl font-medium text-gray-700">Total de pares:  </label>    
                   {{$pedidos->sum('cantidad')}}
                </div>
                </div>

<div class="w-full  bg-white flex-wrap items-center justify-center  pt-0">

</div>
              
<div class="md:px-32 py-1 w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
<table class="min-w-full bg-white">
  <thead> 
  <tr>
  </tr>
  <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">FIBRA Y EVA DE MUJER</th>
   
    <tr class="bg-gray-800 text-white">
      <th class="w-1/2 text-center py-3 px-4 uppercase font-semibold text-sm">Talla</th>
      <th class="w-1/2 text-center py-3 px-4 uppercase font-semibold text-sm">Total</th>
    </tr>
  </thead>
  <tbody class="text-gray-700 ">
  @foreach ($tallasMujer as $item )
    <tr class="hover:bg-orange-100">
      <td class="w-1/2 text-center py-2 px-4 border-b border-grey-light">{{$item[0]->talla}}</td>
      <td class="w-1/2 text-center py-2 px-4 border-b border-grey-light">{{$item->sum('cantidad')}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>


 <!--  -->
<div class="md:px-32 py-1 w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
<table class="min-w-full bg-white">
  <thead> 
  <tr>
  </tr>
  <th class="w-1/2 text-center py-3 px-4 uppercase font-semibold text-sm">FIBRA Y EVA DE HOMBRE</th>
   
    <tr class="bg-gray-800 text-white">
      <th class="w-1/2 text-center py-2 px-4 uppercase font-semibold text-sm">Talla</th>
      <th class="w-1/2 text-center py-2 px-4 uppercase font-semibold text-sm">Total</th>
    </tr>
  </thead>
  <tbody class="text-gray-700 ">
  @foreach ($tallasHombre  as $item )
    <tr class="hover:bg-orange-100 ">
      <td class="w-1/2 text-center py-2 px-4 border-b border-grey-light">{{$item[0]->talla}}</td>
      <td class="w-1/2 text-center py-2 px-4 border-b border-grey-light">{{$item->sum('cantidad')}}</td>
      
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>

<!--  -->
<div class="md:px-32 py-1 w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
<table class="min-w-full bg-white">
  <thead> 
  <tr>
  </tr>
  <th class=" text-center py-3 px-4 uppercase font-semibold text-sm">REATAS HOMBRE</th>
   
    <tr class="bg-gray-800 text-white">
      <th class=" text-center py-2 px-4 uppercase font-semibold text-sm">Cantidad</th>
      <th class=" text-left py-2 px-4 uppercase font-semibold text-sm">Tipo</th>
      <th class=" text-left py-2 px-4 uppercase font-semibold text-sm">Nombre</th>
      <th class=" text-left py-2 px-4 uppercase font-semibold text-sm">Color</th>
    </tr>
  </thead>
  <tbody class="text-gray-700">
  @foreach ($reatas_hombre   as $item )
    <tr class="hover:bg-orange-100">
      <td class=" text-center py-2 px-4 border-b border-grey-light">{{$item->sum('cantidad')}}</td>
      <td class="text-left py-2 px-4 border-b border-grey-light">{{$item[0]->modelo->reata->nombre}} </td>
      <td class="text-left py-2 px-4 border-b border-grey-light">{{$item[0]->modelo->reata->tipo}}</td>
      <td class=" text-left py-2 px-4 border-b border-grey-light">{{$item[0]->modelo->reata->color}}</td>
      
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

<!--  -->
<div class="md:px-32 py-1 w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
<table class="min-w-full bg-white">
  <thead> 
  <tr>
  </tr>
  <th class=" text-center py-3 px-4 uppercase font-semibold text-sm">REATAS MUJER</th>
   
    <tr class="bg-gray-800 text-white">
      <th class=" text-center py-2 px-4 uppercase font-semibold text-sm">Cantidad</th>
      <th class=" text-left py-2 px-4 uppercase font-semibold text-sm">Tipo</th>
      <th class=" text-left py-2 px-4 uppercase font-semibold text-sm">Nombre</th>
      <th class=" text-left py-2 px-4 uppercase font-semibold text-sm">Color</th>
    </tr>
  </thead>
  <tbody class="text-gray-700">
  @foreach ($reatas_mujer as $item )
    <tr class="hover:bg-orange-100">
      <td class=" text-center py-2 px-4 border-b border-grey-light">{{$item->sum('cantidad')}}</td>
      <td class="text-left py-2 px-4 border-b border-grey-light">{{$item[0]->modelo->reata->nombre}} </td>
      <td class="text-left py-2 px-4 border-b border-grey-light">{{$item[0]->modelo->reata->tipo}}</td>
      <td class=" text-left py-2 px-4 border-b border-grey-light">{{$item[0]->modelo->reata->color}}</td>
      
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>



 <!--  -->
 <div class="md:px-32 py-1 w-full">
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
<table class="min-w-full bg-white">
  <thead> 
  <tr>
  </tr>
  <th class="w-1/2 text-center py-3 px-4 uppercase font-semibold text-sm">SUERFICIE</th>
   
    <tr class="bg-gray-800 text-white">
      <th class="w-1/2 text-center py-2 px-4 uppercase font-semibold text-sm">Pares</th>
      <th class="w-1/2 text-left py-2 px-4 uppercase font-semibold text-sm">Superficie</th>
    </tr>
  </thead>
  <tbody class="text-gray-700 ">
  @foreach ($superficie   as $item )
    <tr class="hover:bg-orange-100 ">
      <td class="w-1/2 text-center py-2 px-4 border-b border-grey-light">{{$item->sum('cantidad')}}</td>
      <td class="w-1/2 text-left  py-2 px-4 border-b border-grey-light">{{$item[0]->modelo->tipo}} - {{$item[0]->modelo->superficie}} </td>
      
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>





 <!--  
           

        



            <div class="w-full p-4 lg:w-1/2  plan-card">
            <label  class="block text-2xl font-medium text-gray-700">FIBRA Y EVA DE MUJER</label> 
                @foreach ($tallasMujer as $item )
                   Talla : {{$item[0]->talla}} 
                   Total : {{$item->sum('cantidad')}}<br>
                @endforeach
            </div>

            <div class="w-full p-4 lg:w-1/2 plan-card">
            <label  class="block text-2xl font-medium text-gray-700">FIBRA Y EVA DE HOMBRE</label> 
                @foreach ($tallasHombre as $item )
                    Talla : {{$item[0]->talla}} 
                   Total: {{$item->sum('cantidad')}}<br>
                @endforeach
           
            </div>

            <div class="w-full p-4  plan-card">
            <label  class="block text-2xl font-medium text-gray-700">REATAS  HOMBRE</label> 
                @foreach ($reatas_hombre as $item )
                ({{$item->sum('cantidad')}})
                | {{$item[0]->modelo->reata->nombre}} 
                | {{$item[0]->modelo->reata->tipo}} 
                | {{$item[0]->modelo->reata->color}} <br>
                @endforeach
            </div>

            <div class="w-full p-4  plan-card">
            <label  class="block text-2xl font-medium text-gray-700">REATAS  MUJER</label> 
                @foreach ($reatas_mujer as $item )
                  ({{$item->sum('cantidad')}})
                | {{$item[0]->modelo->reata->tipo}} 
                | {{$item[0]->modelo->reata->nombre}} 
                | {{$item[0]->modelo->reata->color}} <br>
                @endforeach
            </div>


            <div class="w-full p-4  plan-card">
            <label  class="block text-2xl font-medium text-gray-700">Superficie</label> 
                @foreach ($superficie as $item )
                    Paress: {{$item->sum('cantidad')}}
                    Superficie : {{$item[0]->modelo->tipo}} - {{$item[0]->modelo->superficie}} <br>
                @endforeach
           
            </div>

  </div>--->
     
    
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