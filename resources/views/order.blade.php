@extends('layouts.layers')

@section('title', 'Оформить бронирование')

@section('content')
    <div class="starter-template">
        <h1>Подтверждение бронирования:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <form action="{{route('reservation_confirm')}}" method="POST">
                    <div>
                        <p>Заполните форму для боронирования</p>
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Телефон: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Дата: </label>
                                <div class="col-lg-4">
                                    <input type="date" name="date" id="date" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Кол-во
                                    игроков: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="time" id="time" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Время: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="time" id="time" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Пожелания: </label>
                                <div class="col-lg-4">
                                    <textarea name="text" id="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div><h2>Выбранные игры</h2>
                            @foreach($order->games as $game)
                                <p>{{$game->name}}</p>
                                <p>{{$game->price}}</p>
                                <p>{{$game->players}}</p>
                                <p>{{$game->time}}</p>
                                <p>{{$game->room_id}}</p>
                            @endforeach
                        </div>
                        @csrf
                        <input type="submit" class="btn btn-success" value="Подтвердить заказ">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
