@extends('layouts.layers')

@section('title', 'Оформить бронирование')

@section('content')
    <div class="starter-template">
        <h1>Бронирование игры:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <table class="table table-striped-sm">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во человек</th>
                        <th>Время игры</th>
                        <th>Цена</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservation->games as $game)
                        <tr>
                            <td>
                                <a href="{{ route('game', $game->id) }}">
                                    <img src="{{Storage::url($game->img)}}" alt="{{$game->name}}" width="55"
                                         height="75">
                                    {{ $game->name }}
                                </a>
                                <br>
                                <input type="text" name="game_id" value="{{$game->id}}" hidden>
                                <input type="text" name="players" value="{{$game->players}}" hidden>
                                <input type="text" name="room_id" value="{{$game->room_id}}" hidden>
                                <input type="text" name="price" value="{{$game->price}}" hidden>
                                <input type="text" name="user_id" value="{{$game->price}}" hidden>
                                <br>
                                <br>
                            </td>
                            <td>{{$game->players}}</td>
                            <td>{{$game->time}}</td>
                            <td>{{ $game->price }} руб.</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('reservation_remove', $game) }}" method="POST">
                                        <button type="submit" class="btn btn-danger"
                                                href=""><span
                                                aria-hidden="true"></span>Отменить
                                        </button>
                                        @csrf
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
                <form action="{{route('reservation_confirm')}}" method="POST">
                    <div>
                        <h3>Заполните форму для боронирования</h3>
                        @error('date')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        @error('time')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        @error('game_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        @error('room_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        @guest()
                            <p><a href="{{route('register')}}">Зарегистрируйтесь</a> на сайте для возможность
                                отслеживать бронирование,<br> или войдите в
                                <a href="{{route('login')}}">личный
                                    кабинет</a></p>
                        @endguest
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Телефон: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Кол-во
                                    игроков: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="players" id="players" value="" class="form-control"
                                           required>
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
                        <br>
                        <h3>Выберите дату и время брони</h3>
                        <label for="data_reservation">Дата бронирования</label>
                        <input type="date" name="date" required>
                        <br>
                        <label for="time_reservation">Время броирования</label>
                        <select name="time">
                            @foreach($times as $time)
                                <option value="{{$time->id}}">{{$time->name}}</option>
                            @endforeach
                        </select>

                        <br>

                        @foreach($reservation->games as $game)
                            <br>
                            <input type="text" name="game_id" value="{{$game->id}}" hidden>
                            <input type="text" name="players" value="{{$game->players}}" hidden>
                            <input type="text" name="room_id" value="{{$game->room_id}}" hidden>
                            <input type="text" name="price" value="{{$game->price}}" hidden>
                            <input type="text" name="user_id" value="{{$game->price}}" hidden>
                            <br>

                        @endforeach
                        @csrf
                        <input type="submit" class="btn btn-success" value="Подтвердить бронирование">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
