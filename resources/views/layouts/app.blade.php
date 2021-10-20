<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

    <!-- Fonts 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel ="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" origin="anonymous">
    
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow navbar-static-top navbar-color">
            <div class="container-fluid">
                <a class="navbar-brand link-color" href="{{ route('products.index') }}">
                    <img src="{{ asset('/storage/sg_logo.png') }}" alt="SG logo"  width="168"  class="d-inline-block align-text-top">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <form class="d-flex col-sm-5">
                        <input class="form-control me-4 search-color" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <!-- Right Side Of Navbar -->
                    
                    <ul class="navbar-nav ml-auto">
                    @if(isset(Auth::user()->id))
                    <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle rounded link-color" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if((Auth::user()->rol_id)==1)
                                <i class="fas fa-user-shield"></i> Administrador
                                @elseif ((Auth::user()->rol_id)==2)
                                <i class="fas fa-user-cog"></i> Proveedor
                                    @elseif ((Auth::user()->rol_id)==3)
                                    <i class="fas fa-user"></i> Cliente
                                @endif
                            </a>

                            @if(Auth::user()->rol_id==1)
                            <div class="dropdown-menu dropdown-menu-right dropdown-color" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
                            </div>
                            @endif
                            @if(Auth::user()->rol_id==2)
                            
                            <div class="dropdown-menu dropdown-menu-right dropdown-color" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('Mis Pedidos') }}</a>
                            </div>
                            @endif
                            @if(Auth::user()->rol_id==3)
                            
                            <div class="dropdown-menu dropdown-menu-right dropdown-color" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('carts.index') }}">{{ __('Mi Carrito') }}</a>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('Mis Pedidos') }}</a>
                            </div>
                            @endif
                        </li>
                        @endif
                        
                        <!-- Authentication Links -->
                                                
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link link-color rounded" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link link-color rounded" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                        <img src="{{URL::asset('../storage/app/public/uploads/'.Auth::user()->image)}}" alt=""  width="30">
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle rounded link-color" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-color" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('users/'.Auth::user()->id) }}">
                                       Ver perfil
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li>
                        <div class="btn d-inline-block toggle-container">
                            <button class="theme-btn light" onclick="setTheme('light')" title="Light mode">
                            <img src="{{ asset('/storage/default.png') }}" alt="sun" class="rounded" alt="">
                            </button>
                            <button class="theme-btn dark" onclick="setTheme('dark')" title="Dark mode">
                            <img src="{{ asset('/storage/dark.png') }}" alt="moon" class="rounded" alt="">
                            </button>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row g-0">
        <div class="col-sm-3 col-md-2">
            <nav id="navbar-example3" class="navbar  flex-column align-items-stretch p-3 shadow navbar-color">
                <label class="navbar-brand " href="#">Accesos</label>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link link-color" href="{{ route('products.index') }}"><i class="fas fa-lightbulb"></i> {{ __('Productos') }}</a>
                    <nav class="nav nav-pills flex-column">
                        <ul>
                            <a class="nav-link ms-3 my-1 link-color" href="{{ route('products.index') }}"><i class="fas fa-bolt"></i></i> {{ __('Iluminacion Exterior') }}</a>
                            <a class="nav-link ms-3 my-1 link-color" href="{{ route('products.index') }}"><i class="fas fa-home"></i> {{ __('Iluminacion Interior') }}</a>
                            <a class="nav-link ms-3 my-1 link-color" href="{{ route('products.index') }}"><i class="fas fa-car"></i> {{ __('Iluminacion Automotriz') }}</a>
                            <a class="nav-link ms-3 my-1 link-color" href="{{ route('products.index') }}"><i class="fas fa-industry"></i> {{ __('Iluminacion Industrial') }}</a>
                            <a class="nav-link ms-3 my-1 link-color" href="{{ route('products.index') }}"><i class="fas fa-cogs"></i> {{ __('Repuestos y accesorios') }}</a>
                        </ul>
                    </nav>
                    <a class="nav-link link-color" href="#"><i class="fas fa-dollar-sign"></i> Promociones</a>
                    <a class="nav-link link-color" href="{{ route('providers.index') }}"><i class="fas fa-shipping-fast"></i> {{ __('Proveedores') }}</a>
                    @if (isset(Auth::user()->id))
                    <a class="nav-link link-color" href="{{ route('orders.index') }}" ><i class="fas fa-boxes"></i> Mis pedidos</a>
                    @endif
                    <a class="nav-link link-color" href="#"><i class="fas fa-hand-holding-usd"></i> Cotizaciones</a>
                </nav>
            </nav>
        </div>
        <div class="col-sm-3 col-md-10">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
</div>
</div>

<script>
    const setTheme = theme => document.documentElement.className = theme;
    </script>
</body>

<div class="container-fluid">
  <footer class="footer shadow-lg text-center">
  <!-- Grid container -->
  
  <div class="container-fluid p-4 pb-1">
    <!-- Section: Social media -->
    <section class="mb-3">
      <!-- Facebook -->
      <a class="btn btn-primary btn-lg btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook"></i
      ></a>
      <!-- Twitter -->
      <a class="btn btn-primary btn-lg btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>
      <!-- Instagram -->
      <a class="btn btn-primary btn-lg btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>
      <!-- Whatsapp -->
      <a class="btn btn-primary btn-lg btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-whatsapp"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->
  <!-- Copyright -->
  <div class="text-center p-3 footer-copyright">
    © 2021 |
    <a class="link-color" href="#">SGIluminacion.com</a>
  </div>
  <!-- Copyright -->
</footer>
</div>
<!-- End of .container -->
</html>
