<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('main.name', 'KDH') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://bootswatch.com/4/superhero/bootstrap.min.css" rel="stylesheet" type="text/css">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-dark light">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container m-0 col-12">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('main.name', 'Koding Dengan Hati') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ml-0">
                        
                    </ul>

                    <ul class="navbar-nav mc-auto col-8">
                        <form class="form-inline my-2 my-lg-0 col-12" method="POST">
                          <input class="form-control mr-sm-2 col-10" type="text" placeholder="Search">
                          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto mr-0">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

        <footer class="sticky-bottom bg-light footer p-5 col-12 text-dark">
            <div class="form-inline">
                <div class="kiri m-2 mr-auto col-3 bg-primary">
                    kiri
                </div>
                <div class="tengah m-2 mr-auto col-3 bg-danger">
                    tengah
                </div>
                <div class="kanan m-2 col-3 bg-warning">
                    kanan
                </div>
            </div>   
            <div class="form-inline">
                <div class="kiri m-2 mr-auto col-3">
                    kiri
                </div>
                <div class="tengah m-2 mr-auto col-3">
                    tengah
                </div>
                <div class="kanan m-2 col-3">
                    kanan
                </div>
            </div> 
            <div class="form-inline">
                <div class="kiri m-2 mr-auto col-3">
                    kiri
                </div>
                <div class="tengah m-2 mr-auto col-3">
                    tengah
                </div>
                <div class="kanan m-2 col-3">
                    kanan
                </div>
            </div> 
                     
        </footer>
    </div>
</body>
</html>
