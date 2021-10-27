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
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg shadow navbar-static-top navbar-color">
            <div class="container-fluid">
                <a class="navbar-brand link-color" href="{{ route('products.index') }}">
                    <img src="{{ asset('/storage/sg_logo.png') }}" alt="SG logo"  width="200"  class="d-inline-block align-text-top">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <form action="{{ route('products.index') }}" class="d-flex col-sm-5">
                        <input class="form-control me-4 search-color" name="search" value="" type="search" placeholder="Buscar" aria-label="search">
                        &nbsp<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->                  
                        @guest
                        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link link-color rounded" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link link-color rounded" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif
                            
                        @else
                        <div class="text-center">
                        <img src="{{URL::asset('../storage/app/public/uploads/'.Auth::user()->image)}}" alt=""  class="rounded-circle shadow" width="40" height="40" data-holder-rendered="true">
                        </div>
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle rounded link-color" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-color" aria-labelledby="navbarDropdown">
                                    
                                    
                                    <a class="dropdown-item" href="{{ url('users/'.Auth::user()->id) }}">
                                       Ver perfil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    
                                    <a class="dropdown-item" href="#">
                                    @if((Auth::user()->rol_id)==1)
                                        <i class="fas fa-user-shield"></i>
                                    @elseif ((Auth::user()->rol_id)==2)
                                        <i class="fas fa-user-cog"></i>
                                    @else
                                        <i class="fas fa-user"></i>
                                    @endif
                                    {{Auth::user()->rol->name}}</a>

                                    @if(Auth::user()->rol_id==1)
                                        <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
                                    @elseif(Auth::user()->rol_id==2)
                                        <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('Mis Pedidos') }}</a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('carts.index') }}">{{ __('Mi Carrito') }}</a>
                                    <a class="dropdown-item" href="{{ route('orders.index') }}">{{ __('Mis Pedidos') }}</a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li>
                            <button class="theme-btn light" onclick="setTheme('light')" title="Light mode">
                            <img src="{{ asset('/storage/default.png') }}" alt="sun" width="30" class="rounded" alt="">
                            </button>
                            <button class="theme-btn dark" onclick="setTheme('dark')" title="Dark mode">
                            <img src="{{ asset('/storage/dark.png') }}" alt="moon" width="30" class="rounded" alt="">
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


<div class="container-fluid">
    <div class="row align-items-start">
        <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 navbar flex-column align-items-start p-2 shadow navbar-color" style="position:sticky; top:0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-2 pt-2 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-sm-start" id="menu">
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle link-color">
                        <i class="fas fa-box"></i><span class="ms-1 d-none d-sm-inline"> {{ __('Productos') }}</span></a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ route('products.index') }}" class="nav-link px-2 align-middle link-color">
                                <i class="fas fa-th-large"></i></i> <span class="ms-1 d-none d-sm-inline">{{ __('Todos') }}</span></a>
                            </li>
                            <li class="w-100">
                                <form action="{{ route('products.index') }}" class="d-grid gap-2">
                                    <input name="category" value="1" type="hidden" placeholder="" aria-label="search">
                                    <button class="btn nav-link px-2 link-color" type="submit"><i class="fas fa-home"></i> <span class="d-none d-sm-inline"> {{ __('Iluminación Interior') }}</span></button>
                                </form>
                            </li>
                            <li class="w-100">
                                <form action="{{ route('products.index') }}" class="d-grid gap-2">
                                    <input name="category" value="2" type="hidden" placeholder="" aria-label="search">
                                    <button class="btn nav-link px-2 link-color" type="submit"><i class="fas fa-bolt"></i> <span class="d-none d-sm-inline"> {{ __('Iluminación Exterior') }}</span></button>
                                </form>
                            </li>
                            <li class="w-100">
                                <form action="{{ route('products.index') }}" class="d-grid gap-2">
                                    <input name="category" value="3" type="hidden" placeholder="" aria-label="search">
                                    <button class="btn nav-link px-2 link-color" type="submit"><i class="fas fa-car"></i> <span class="d-none d-sm-inline"> {{ __('Iluminación Automotriz') }}</span></button>
                                </form>
                            </li>
                            <li class="w-100">
                                <form action="{{ route('products.index') }}" class="d-grid gap-2">
                                    <input name="category" value="4" type="hidden" placeholder="" aria-label="search">
                                    <button class="btn nav-link px-2 link-color" type="submit"><i class="fas fa-industry"></i> <span class="d-none d-sm-inline"> {{ __('Iluminación Industrial') }}</span></button>
                                </form>
                            </li>
                            <li class="w-100">
                                <form class="d-grid gap-2">
                                    <input name="category" value="5" type="hidden" placeholder="" aria-label="search">
                                    <button class="btn nav-link px-2 link-color" type="submit"><i class="fas fa-cogs"></i> <span class="d-none d-sm-inline"> {{ __('Repuestos y accesorios') }}</span></button>
                                </form>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle link-color">
                        <i class="fas fa-dollar-sign"></i></i> <span class="ms-1 d-none d-sm-inline">Promociones</span></a>
                    </li>
                    <li>
                        <a href="{{ route('providers.index') }}" class="nav-link px-0 align-middle link-color">
                        <i class="fas fa-shipping-fast"></i></i> <span class="ms-1 d-none d-sm-inline">Proveedores</span></a>
                    </li>
                    @if (Auth::check())
                    <li>
                        <a href="{{ route('orders.index') }}" class="nav-link px-0 align-middle link-color">
                        <i class="fas fa-boxes"></i></i> <span class="ms-1 d-none d-sm-inline">Mis Pedidos</span></a>
                    </li>
                    @endif
                    <li>
                        <a href="http://wa.me/+522462380354" target="_blank"class="nav-link px-0 align-middle link-color">
                        <i class="fas fa-hand-holding-usd"></i></i> <span class="ms-1 d-none d-sm-inline">Cotizaciones</span></a>
                    </li>
                    <div class="px-4">
                        <!--<img src="http://pa1.narvii.com/7450/ee32253654850692d9c3e7a5d64ded6c2543b1f6r1-320-320_00.gif" class="rounded mx-auto d-block" alt="..."  width="150">  -->    
                    </div>
                </ul>
            </div>
        </div>
        <div class="col py-3" id="content">
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
  
  <div class="container-fluid p-3 pb-1">
    <!-- Section: Social media -->
    <section class="mb-3">
      <!-- Facebook -->
      <a class="btn btn-primary btn-lg" href="#"
        ><i class="fab fa-facebook"></i
      ></a>
      <!-- Twitter -->
      <a class="btn btn-primary btn-lg" href="#"
        ><i class="fab fa-twitter"></i
      ></a>
      <!-- Instagram -->
      <a class="btn btn-primary btn-lg" href="#"
        ><i class="fab fa-instagram"></i
      ></a>
      <!-- Whatsapp -->
      <a class="btn btn-primary btn-lg" href="#"
        ><i class="fab fa-whatsapp"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->
  <span>SG Iluminacion Slogan | Novaware</span>
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
