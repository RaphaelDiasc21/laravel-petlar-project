<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{url('static/css/layout.css')}}" rel="stylesheet">
        <link href="{{url('static/css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        <header class="header__main">
            <nav class="nav__main">
                <div class="nav-item--main">
                    <a href="{{route('main')}}">
                        PetLar
                    </a>
                 </div>
                 <ul class="nav-item">
                    <li>
                        <a href="{{route('posts.adocoes')}}">Adoções</a>
                    </li>
                    <li>
                        <a href="{{route('posts.perdidos')}}">Perdidos</a>
                    </li>
                    <li>
                        <a href="{{route('posts.encontrados')}}">Encontrados</a>
                    </li>
                    @if(Session::get('nome') == null)
                    <li>
                        <a href="{{route('usuarios.registrar')}}">Registrar</a>
                    </li>
                    @endif
                    @if(Session::get('nome') != null)
                    <li>
                        <a href="{{route('usuario.deslogar')}}">Deslogar</a>
                    </li>
                    @endif
                    @if(Session::get('nome') == null)
                    <li>
                        <a href="{{route('usuario.logar')}}">Logar</a>
                    </li>
                    @endif
                    @if(Session::get('nome') != null)
                    <li>
                        <a href="{{route('post.index')}}">Postar</a>
                    </li>
                    @endif
                    @if(Session::get('nome') != null)
                    <li>
                        <a href="{{route('posts.usuario')}}">Meus posts</a>
                    </li>
                    @endif
                 </ul>
            </nav>
        </header>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{url('js/jquery.mobile-1.4.5.min.js')}}" ></script>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="{{url('js/bootstrap.min.js')}}" ></script>
    
        @yield('scripts')

    </body>
</html>
