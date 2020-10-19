@extends('layers')
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
                    @include('card_game', ['room'=>$room])
                @endforeach
            </div>
        </div>
    </div>
@endsection

