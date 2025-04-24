<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class ="fondo">
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm @guest bg-white @else bg-orange @endguest"style="@auth background-color: #FF9800 !important; @endauth">>
            <div class="container">
                <a class="navbar-brand" href="" style="text-decoration: none; color:rgb(255, 255, 255); ">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('Iniciar Sesion'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('Registrarse'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if (Auth::user()->cod_tipo_fk == 'A')
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('home')}}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('deportistas.index')}}">Deportistas</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('entrenadores.index')}}">Entrenadores</a>
                        </li>

                        @elseif (Auth::user()->cod_tipo_fk == 'D')
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('home')}}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('deportistas.perfil') }}">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('deportistas.rutinas') }}">Rutinas</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('clubes.index') }}">Clubes</a>
                        </li>

                        @elseif (Auth::user()->cod_tipo_fk == 'E')
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('home')}}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('entrenadores.perfil') }}">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class='nav-link' href="{{ route('clubes.index') }}">Clubes</a>
                        </li>
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
