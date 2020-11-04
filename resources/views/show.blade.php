@extends('layouts.app')

@section('title', 'Бронирование:' . $reservation->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
{{--                    <h1>{{$reservation->user->name}}</h1>--}}
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>
                                Поле
                            </th>
                            <th>
                                Значение
                            </th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>{{$reservation->id}}</td>
                        </tr>
                        <tr>
                            <td>Имя</td>
                            <td>{{$reservation->name}}</td>
                        </tr>
                        <tr>
                            <td>Телефон</td>
                            <td>{{$reservation->phone}}</td>
                        </tr>
                        <tr>
                            <td>Состояние</td>
                            <td>{{$reservation->sost_id}}</td>
                        </tr>
                        <tr>
                            <td>Кол-во игроков</td>
                            <td>{{$reservation->players}}</td>
                        </tr>
                        <tr>
                            <td>Пожелания</td>
                            <td>{{$reservation->text}}</td>
                        </tr>
                        <tr>
                            <td>Дата бронирования</td>
                            <td>{{$reservation->date}}</td>
                        </tr>
                        <tr>
                            <td>Время бронирования</td>
                            <td>{{$reservation->time}}</td>
                        </tr>
                        <tr>
                            <td>Комната</td>
{{--                            <td>{{$reservation->r->name}}</td>--}}
                        </tr>
                        <tr>
                            <td>Игра</td>
                            <td>{{$reservation->game}}</td>
                        </tr>



                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

