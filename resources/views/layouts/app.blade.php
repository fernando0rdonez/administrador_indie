<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Indie Sandalias</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">


        <section class="h-screen w-screen bg-gray-200 flex flex-col-reverse sm:flex-row min-h-0 min-w-0 overflow-hidden">
          <aside class="sm:h-full sm:w-16 w-full h-12 bg-gray-800 text-gray-200">
            <ul class="text-center flex flex-row sm:flex-col w-full">
              <li class="h-14 border-b border-gray-900 hidden sm:block">
                <a id="page-icon" href="{{ route('pedido.index') }}" class="h-full w-full hover:bg-gray-700 block p-3">
                  <img class="object-contain h-full w-full" src="https://avatars1.githubusercontent.com/u/6157842?v=4"
                    alt="open-source" />
                </a>
              </li>
              <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Pedidos">
                <a id="page-icon"  href="{{ route('pedido.index') }}" class="h-full w-full hover:bg-gray-700 block p-3">
                  <i class="fas fa-inbox fill-current"> </i>
                </a>
              </li>
              <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Clientes">
                <a id="page-icon" href="{{ route('cliente.index') }}" class="h-full w-full hover:bg-gray-700 block p-3">
                <i class="fas fa-users fill-current"> </i>
                </a>
              </li>
              <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Modelos">
                <a id="page-icon"  href="{{ route('modelo.index') }}" class="h-full  w-full hover:bg-gray-700 block p-3">
                  <i class="fas fa-shoe-prints fill-current"></i>
                </a>
              </li>
              <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Reatas">
                <a id="page-icon" href="{{ route('reata.index') }}" class="h-full  w-full hover:bg-gray-700 block p-3">
                <i class="fas fa-grip-lines"></i>
                </a>
              </li>
              <li class="sm:border-b border-gray-900 flex-1 sm:w-full" title="Materiales">
                <a id="page-icon" href="{{ route('pedido.materiales') }}" class="h-full  w-full hover:bg-gray-700 block p-3">
                <i class="fab fa-accusoft"></i>
                </a>
              </li>
            </ul>
          </aside>
          <main class="sm:h-full flex-1 flex flex-col min-h-0 min-w-0 overflow-auto">
            <nav class="border-b bg-white px-6 py-2 flex items-center min-w-0 h-14">
              <h1 class="font-semibold text-lg"></h1>
              <span class="flex-1"></span>
              <span class="mr-2">
                <input type="text" placeholder="Search"
                  class="w-full border-2 px-2 py-1  border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-gray-300 focus:bg-gray-100" />
              </span>
              <button
                class="border rounded-full ml-2 w-10 h-10 text-center leading-none text-gray-200 bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                <i class="fas fa-user fill-current"></i>
              </button>
            </nav>
            <section class="flex-1 pt-3 md:p-6 lg:mb-0 lg:min-h-0 lg:min-w-0">
              <div class="flex flex-col lg:flex-row h-full w-full">
               
                <main class="py-4 mx-auto w-full md:w-auto md:mt-15 lg:px-12 xl:px-16">
                    @yield('content')
                </main>
                
        
              </div>
            </section>
            <footer class="px-6 py-3 border-t flex w-full items-end">
           
            </footer>
          </main>
        </section>
        
        <style>
          @import url("https://fonts.googleapis.com/css2?family=Nunito&display=swap");
        
        body {
          font-family: "Nunito", sans-serif;
        }
        
        main {
          font-size: clamp(0.9rem, 3vw, 1rem);
        }
        
        #page-icon img {
          -webkit-animation: cssfilter 3s infinite;
        }
        
        
        @-webkit-keyframes cssfilter {
          0%, 100%  {  
            filter: invert(75%) drop-shadow(0px 0px 2px blue) 
          }
          
          50% { 
            filter: invert(0%) drop-shadow(0px 0px 1px teal); 
          }
        }
        </style>

    </div>
</body>
</html>
