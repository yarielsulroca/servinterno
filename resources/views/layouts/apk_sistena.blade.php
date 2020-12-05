<html>
<head>
    <title>DN - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <!--Boostrap 4 css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FONTS -->
    <link rel="stylesheet" href="{{asset('fonts/css/all.css')}}" >
    <link rel="stylesheet" href="{{asset('fonts/css/fontawesome.css.css')}}" >
    <link rel="stylesheet" href="{{asset('fonts/css/brands.css.css')}}" >
    <link rel="stylesheet" href="{{asset('fonts/css/solid.css.css')}}" >

    <!-- Estilos personales -->
    <style type="text/css">

    </style>
</head>
<body>
<div class="container">
    <!--Barra navegacion horizontal -->
    <nav class="navbar navbar-expand  navbar-light bg-info">
        <a class="navbar-brand" href="#">
            <div class="text-color" >
                <img src="{!! asset('images/logo4.png') !!}" width="120px" height="50px">
            </div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- separadores por espacios (&nbsp) -->
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <!-- FIN separadores por espacios -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link "  href="{{route('home')}}"><div class="text-color">Inicio</div><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('sistema.index')}}" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="text-color">Plan/Medidas</div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('sistema.index')}}">Enero</a>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('sistema.index')}}">Febrero</a>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('sistema.index')}}">Marzo</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><div class="text-color">Buscar</div></button>
            </form>
            &nbsp
            &nbsp
            &nbsp
            <!--Cerrar sesion -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="btn btn-outline-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="text-color"><i class="fa fa-user"></i>&nbsp{{ Auth::user()->name }}</div> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <!--Cerrar sesion -->
        </div>
    </nav>
    <!--FIN Barra navegacion horizontal -->

</div>
<!-- Scripts-->
<script src="{{asset('js/myJavaScript.js')}}"></script>
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- FONTS -->
<script src="{{asset('fonts/js/all.js')}}"></script>
<script src="{{asset('fonts/js/fontawesome.js')}}"></script>
<script src="{{asset('fonts/js/brands.js')}}"></script>
<script src="{{asset('fonts/js/solid.js')}}"></script>
<!-- Fin Scripts-->
@yield('content')
</body>

</html>