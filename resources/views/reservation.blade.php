@extends('layouts.layers')

@section('title', 'Бронирование')

@section('content')
    <div class="starter-template">
        <h1>Бронирование</h1>
        <div class="panel">
            @if($order == null)
                <h2>Выберите игру для бронирования</h2>
                <a href="{{route('games')}}"
                   class="btn btn-default"
                   role="button">Игры</a>
            @else
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во человек</th>
                        <th>Время игры</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->games as $game)
                        <tr>
                            <td>
                                <a href="{{ route('game', $game->id) }}">
                                    <img height="56px"
                                         src="{{$game->img}}">
                                    {{ $game->name }}
                                </a>
                            </td>
                            <td>{{$game->players}}</td>
                            <td>{{$game->time}}</td>
                            <td>{{ $game->price }} руб.</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('reservation_remove', $game) }}" method="POST">
                                        <button type="submit" class="btn btn-danger"
                                                href=""><span
                                                aria-hidden="true"></span>Удалить
                                        </button>
                                        @csrf
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">Общая стоимость:</td>
                        <td>{{$order->getFullPrice()}} руб.</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href="{{route('reservation_place')}}">Оформить
                        бронирование</a>
                </div>
        </div>
        @endif
    </div>
@endsection
