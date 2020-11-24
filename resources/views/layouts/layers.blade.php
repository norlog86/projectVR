<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link type="text/css" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans:400,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('js/datepicker/jquery.datetimepicker.min.css')}}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="row d-flex align-items-center justify-content-center">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img src="/img/logo.svg" alt="">
                </a>
                <div class="navbar-nav">
                    {{--                <li @if(Route::currentRouteNamed('game*')) class="active" @endif><a href="{{route('games')}}">Игры</a></li>--}}
                    <a class="nav-item nav-link" @routeactive('game*') href="{{route('games')}}">Игры</a>
                    <a class="nav-item nav-link" @routeactive('room*') href="{{route('rooms')}}">Комнаты</a>
                    <a class="nav-item nav-link" @routeactive('about') href="{{route('about')}}">О нас</a>
                    <a class="nav-item nav-link" @routeactive('reservation*') href="{{route('reservation')}}">Бронирование</a>
                    @guest
                        <a class="nav-item nav-link" href="{{route('register')}}">Регистрация</a>
                        <a class="nav-item nav-link" href="{{route('login')}}">Войти</a>
                    @endguest
                    @auth
                        <a class="nav-item nav-link" href="{{route('home')}}">Кабинет</a>
                        <a class="nav-item nav-link" class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти'.' '.'('.Auth::user()->name.')') }}
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container pt-150">
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
@yield('scripts')
</body>
</html>

