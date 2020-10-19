@extends('layers')
@section('title', 'Игры')
@section('content')
    <div class="container">
        <div class="starter-template">
            <div class="panel">
                @foreach($games as $game)
                    @include('card_game', compact('game'))
                @endforeach
            </div>
        </div>
@endsection


