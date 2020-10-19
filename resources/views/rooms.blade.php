@extends('layers')
@section('title', 'Комнаты')
@section('content')
    <div class="container">
        <div class="starter-template">
            @foreach($rooms as $room)
                <div class="panel">
                    <a href="{{route('room', $room->path)}}">
                        <img src="{{$room->img}}">
                        <h2>{{$room->name}}</h2>
                    </a>
                    <p>
                        {{$room->text}}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection