@extends('layers')
@section('title',  'Игра:'.' '.$game->name)
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>{{$game->name}}</h1>
            <img src="{{$game->img}}">
            <p><b>Время игры:</b> {{$game->time}}</p>
            <p><b>Цена:</b> {{$game->price}} ₽</p>
            <p><b>Количество игроков:</b> {{$game->players}}</p>
            <p><b>Тип игры:</b> {{$game->type->name}}</p>
            <p><b>Описание:</b> {{$game->text}}</p>
            <p><b>Комната:</b> {{$game->room->name}}</p>

            <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
                <button type="submit" class="btn btn-success" role="button">Забронировать</button>

                <input type="hidden" name="_token" value="R0Mb6NTvrGsRHuRb6m6rfcnDdULmckQeo3daRy1l"></form>
        </div>
    </div>
@endsection

