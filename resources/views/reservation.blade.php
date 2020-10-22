@extends('layers')

@section('title', 'Бронирование')

@section('content')
    <div class="starter-template">
        <h1>Бронирование</h1>
        <p>Оформление заказа</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во человек</th>
                    <th>Время</th>
                    <th>Дата</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->games as $game)
                    <tr>
                        <td>
                            <a href="{{ route('game', [$game->room->path, $game->path]) }}">
                                <img height="56px"
                                     src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg">
                                {{ $game->name }}
                            </a>
                        </td>
                        <td><span class="badge">{{$game->players}}</span>
                            <div class="btn-group">
                                <a type="button" class="btn btn-danger"
                                   href="http://laravel-diplom-1.rdavydov.ru/basket/1/remove"><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                                <form action="{{ route('reservation_add', $game) }}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href=""><span
                                                class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{$game->time}}</td>
                        <td>10.01.2021</td>
                        <td>{{ $game->price }} руб.</td>
                        <td>{{ $game->price }} руб.</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Общая стоимость:</td>
                    <td>71990 руб.</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="">Оформить
                    бронирование</a>
            </div>
        </div>
    </div>
@endsection
Здравствуй
Вопрос: бронирование должно быть только одной игры или сделать что-бы сразу несколько можно было забронировать ?