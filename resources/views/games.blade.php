@extends('layouts.layers')
@section('title', 'Игры')
@section('content')
    <div class="container">
        <div class="starter-template">
            <div class="panel">
                @foreach($games as $game)
{{--                    @dd($games)--}}
                    @include('card.card_game', compact('game'))
                @endforeach
            </div>
        </div>
@endsection


