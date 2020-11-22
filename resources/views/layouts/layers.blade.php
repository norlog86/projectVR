<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('js/datepicker/jquery.datetimepicker.min.css')}}" />
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">VR парк</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
{{--                <li @if(Route::currentRouteNamed('game*')) class="active" @endif><a href="{{route('games')}}">Игры</a></li>--}}
                <li @routeactive('game*')><a href="{{route('games')}}">Игры</a></li>
                <li @routeactive('room*')><a href="{{route('rooms')}}">Комнаты</a></li>
                <li @routeactive('about')><a href="{{route('about')}}">О нас</a></li>
                <li @routeactive('reservation*')><a href="{{route('reservation')}}">Бронирование</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{route('register')}}">Регистрация</a></li>
                    <li><a href="{{route('login')}}">Войти</a></li>
                @endguest
                @auth
                    <li><a href="{{route('home')}}">Кабинет</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выйти'.' '.'('.Auth::user()->name.')') }}
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session()->has('success'))
        <br>
        <p class="alert alert-success">{{session()->get('success')}}</p>
    @endif
        <br>
        @if(session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
    @yield('content')
</div>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
@yield('scripts')
</body>
</html>

