<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Editorial Chungara</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">


    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <i class="fas fa-book" style="margin-right: 10px;"> </i>
                <strong> Editorial Chungara</strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/')}}">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categorias as $c)
                                
                            <a class="dropdown-item" href="{{ url('categorias/'.$c->id) }}">{{ $c->nombre }}</a>
                                <div class="dropdown-divider"></div>
                            @endforeach
                            
                        </div>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a class="btn btn-success" style="margin-right: 5px;" href="{{ route('login') }}">Ingresar</a>
                        </li>
                        <li>
                            <a class="btn btn-info" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('panel') }}">
                                    Panel
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Salir
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Carrito
                            </a>
                        </li> --}}
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main role="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p class="float-right">
                <a href="#">Volver Arriba</a>
            </p>
            <p>Sistema Creado  por Estudiantes de la Unifranz &copy;</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap/js/jquery-slim.min.js')}}" ></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" ></script>
    <script src="{{ asset('bootstrap/js/popper.min.js')}}" ></script>
    <script src="{{ asset('bootstrap/js/holder.min.js')}}" ></script>
    @yield('addscripts')
  </body>
</html>
