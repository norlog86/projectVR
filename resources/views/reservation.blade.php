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
{{--                    @dd($reservation->rooms)--}}
                    @foreach($reservation->games as $game)
                        <tr>
                            <td>
                                <p style="color: #2e6da4">{{$game->name}}</p>
                                <br>
                                <input type="text" id="game-id" name="game_id" value="{{$game->id}}" hidden>
                                <input type="text" name="room_id" value="{{$game->room_id}}" hidden>
                                <input type="text" name="price" value="{{$game->price}}" hidden>
                                <br>
                                <br>
                            </td>
                            <td>{{$game->players}}</td>
                            <td>{{$game->time}}</td>
                            <td>{{$game->price }} руб.</td>
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
                                игроков для игры {{$game->players}}: </label>
                            <div class="col-lg-4">
                                @foreach($reservation->games as $game)
                                    <input type="text" name="players" title="{{$game->players}}"
                                           pattern="[0-{{$game->players}}]" id="players" value="" class="form-control"
                                           required
                                           oninvalid="setCustomValidity('Введите допустимое число игроков для этой игры {{$game->players}} и менее')"
                                           onchange="try{setCustomValidity('')}catch(e){}">
                                @endforeach
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
                    <input type="text" name="date" required id="game-date" autocomplete="off">
                    <br>
                    <label for="time_reservation">Время броирования</label>
                    <div class="row" id="time-list">
                        <!--Сюда придет все с аякса из файла time-list.blade-->

                    </div>
                    <select name="time">
                        @foreach($times as $time)
                            @if($time->name)
                                <option value="{{$time->id}}">{{$time->name}}</option>
                            @endif
                        @endforeach
                    </select>

                    <br>

                    @foreach($reservation->games as $game)
                        <br>
                        <input type="text" name="game_id" value="{{$game->id}}" hidden>
                        <input type="text" name="room_id" value="{{$game->room_id}}" hidden>
                        <input type="text" name="price" value="{{$game->price}}" hidden>
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
@section("scripts")
    <script>
        //При изменении даты
        $( "#game-date" ).change(function(){
            //ццсрф токен
            $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
            //аякс запрос
            $.ajax({
                type: 'get',
                //ссылка
                url: '/time-list',
                //данные из инпута
                data: $("#game-date").serialize()+'&game_id='+$("#game-id").val(),
                beforeSend: function (data) {
                    //тут потом закину прелоадер и заранее опустошаем див
                    $('#time-list').empty();
                },
                success: function (data) {
                    //Закидываем данные из partials/time-list
                    $('#time-list').html(data);
                }
            });
        });

        $(".btn-time").click(function(e){
            alert("dasd");
            //$(this).data("time")
        });

    </script>
<!--Date picker  -->
    <script>
        //Классический формат
        jQuery('#game-date').datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
        $.datetimepicker.setLocale('ru');
    </script>
@endsection
