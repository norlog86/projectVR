@extends('layouts.layers')
@section('title', $room->name)
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>
                {{$room->name}}
            </h1>
            <p>
                {{$room->text}}
            </p>
            <div class="filters row">
                @foreach($games as $game)
                    @include('card.card_game', ['id'=>$game->game_id, 'game'=>$game])
                @endforeach
            </div>
        </div>
    </div>
@endsection

