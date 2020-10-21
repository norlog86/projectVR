@extends('layers')

@section('title', 'Бронирование')

@section('content')
    <h1 align="center">Бронирование: {{$reservation->name}}</h1>
    <div class="container">
        <div class="starter-template">
            <form action="{{route('reservation_add', $reservation)}}" method="POST">
            <img src="{{$reservation->img}}">
            <p><b>Время игры:</b> {{$reservation->time}}</p>
            <p><b>Цена:</b> {{$reservation->price}} ₽</p>
            <p><b>Количество игроков:</b> {{$reservation->players}}</p>
            <p><b>Тип игры:</b> {{$reservation->sost_id}}</p>
            <p><b>Описание:</b> {{$reservation->text}}</p>
            <p><b>Комната:</b> {{$reservation->room_id}}</p>

                <button type="submit" class="btn btn-success" role="button">Забронировать</button>
                @csrf
            </form>
        </div>
    </div>

@endsection