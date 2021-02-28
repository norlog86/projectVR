@extends('layouts.layers')

@section('title', 'Главная')

@section('content')
    <h3>Выберите игру</h3>

    <div class="container">
        <div class="starter-template">
            <h1>Игры</h1>
            <div class="filters row">
                @foreach($games as $game)
                    @include('card.card_game_room', ['game'=>$game])
                @endforeach
            </div>
        </div>
        <div class="starter-template">
            <h1>Комнаты</h1>
            <div class="filters row">
                @foreach($rooms as $room)
                    @include('card.card_room', compact('room'))
                @endforeach
            </div>
        </div>
    </div>
@endsection


