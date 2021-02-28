@extends('layouts.layers')
@section('title',  'Игра:'.' '.$game->name)
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>{{$game->name}}</h1>
{{--           @dd($rooms)--}}
            <img src="{{Storage::url($game->img)}}" width="200" height="250">
            <p><b>Время игры:</b> {{$game->time}}</p>
            <p><b>Цена:</b> {{$game->price}} ₽</p>
            <p><b>Количество игроков:</b> {{$game->players}}</p>
            <p><b>Тип игры:</b> {{$game->type_game->name}}</p>
            <p><b>Описание:</b> {{$game->text}}</p>
            <p><b>Комната:</b> {{$rooms->room_id}}</p>
            <form action="{{route('reservation_add', ['id'=>$game->id, 'room'=>$rooms->room_id] )}}" method="POST">
                <button type="submit" class="btn btn-success" role="button">Бронировать</button>
                @csrf
            </form>
        </div>
    </div>
@endsection

