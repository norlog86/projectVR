@extends('layouts.layers')
@section('title', 'Игры')
@section('content')
    <div class="container">
        <div class="starter-template">
            <div class="panel">
                @foreach($games as $game)
                    @include('card.card_game', ['id'=>$game->game_id, 'game'=>$game])
                @endforeach
            </div>
        </div>
@endsection


