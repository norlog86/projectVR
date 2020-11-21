@extends('layouts.app')

@section('title', 'Бронирование:' . $reservation->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1>Просмотр бронирования</h1>
                    <table class="table">
                        <tbody>
                        <tr style="background: #e6e6e6">
                            <td><b>Номер бронирования</b></td>
                            <td>{{$reservation->id}}</td>
                        </tr>
                        <tr style="background: #4a5568">
                            <td><h3>Личные данные</h3></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="right">Имя</td>
                            <td align="left" style="background: #cccccc">{{$reservation->name}}</td>
                        </tr>
                        <tr>
                            <td align="right">Телефон</td>
                            <td align="left" style="background: #cccccc">{{$reservation->phone}}</td>
                        </tr>
                        <tr style="background: #4a5568">
                            <td><h3>Информация</h3></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="right">Кол-во игроков</td>
                            <td align="left" style="background: #cccccc">{{$reservation->players}}</td>
                        </tr>
                        <tr>
                            <td align="right">Пожелания</td>
                            <td align="left" style="background: #cccccc">{{$reservation->text}}</td>
                        </tr>
                        <tr style="background: #4a5568">
                            <td><h3>Состояние бронирования</h3></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="right">Дата бронирования</td>
                            <td align="left" style="background: #cccccc">{{$reservation->date}}</td>
                        </tr>
                        <tr>

                            <td align="right">Время бронирования</td>
                            <td align="left" style="background: #cccccc">    <?php
                                if ($reservation->time == 1) {
                                    echo '9:00';
                                } elseif ($reservation->time == 2) {
                                    echo '9:30';
                                } elseif ($reservation->time == 3) {
                                    echo '10:00';
                                } elseif ($reservation->time == 4) {
                                    echo '10:30';
                                } elseif ($reservation->time == 5) {
                                    echo '11:00';
                                } elseif ($reservation->time == 6) {
                                    echo '11:30';
                                } elseif ($reservation->time == 7) {
                                    echo '12:00';
                                } elseif ($reservation->time == 8) {
                                    echo '12:30';
                                } elseif ($reservation->time == 9) {
                                    echo '13:00';
                                } elseif ($reservation->time == 10) {
                                    echo '13:30';
                                } elseif ($reservation->time == 11) {
                                    echo '14:00';
                                } elseif ($reservation->time == 12) {
                                    echo '14:30';
                                } elseif ($reservation->time == 13) {
                                    echo '15:00';
                                } elseif ($reservation->time == 14) {
                                    echo '15:30';
                                } elseif ($reservation->time == 15) {
                                    echo '16:00';
                                } elseif ($reservation->time == 16) {
                                    echo '16:30';
                                } elseif ($reservation->time == 17) {
                                    echo '17:00';
                                } elseif ($reservation->time == 18) {
                                    echo '17:30';
                                } elseif ($reservation->time == 19) {
                                    echo '18:00';
                                } elseif ($reservation->time == 20) {
                                    echo '18:30';
                                } elseif ($reservation->time == 21) {
                                    echo '19:00';
                                } elseif ($reservation->time == 22) {
                                    echo '19:30';
                                } elseif ($reservation->time == 23) {
                                    echo '20:00';
                                } elseif ($reservation->time == 24) {
                                    echo '20:30';
                                } elseif ($reservation->time == 25) {
                                    echo '21:00';
                                } elseif ($reservation->time == 26) {
                                    echo '21:30';
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td align="right">Состояние</td>
                            <td align="left" style="background: #cccccc">{{$reservation->sost->name}}</td>
                        </tr>
                        <tr style="background: #4a5568">
                            <td><h3>Игра</h3></td>
                            <td></td>
                        </tr>
                        @foreach($reservation->games as $game)
                            <tr>
                                <td align="right">Игра</td>
                                <td align="left" style="background: #cccccc">{{$game->name}}<br><img
                                            src="{{Storage::url($game->img)}}" alt="{{$game->name}}" width="75"
                                            height="95"></td>
                            </tr>
                            <tr>
                                <td align="right">Комната</td>
                                <td align="left" style="background: #cccccc">{{$reservation->room->name}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if($reservation->sost_id == 0 || $reservation->sost_id == 2)
            @else
                <form action="{{route('reservation_drop', $reservation->id)}}" method="POST">
                    <div align="center">
                        <input type="submit" class="btn btn-danger" value="Отменить бронирование">
                    </div>
                    {{ method_field('PATCH') }}
                    @csrf
                </form>
            @endif
        </div>
    </div>
    {{--@php(dd($reservation->sost_id))--}}
@endsection

