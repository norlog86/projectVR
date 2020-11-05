@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{--                <div class="card">--}}
                <div class="card-header">{{ __('Кабинет') }}</div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div id="app">
                    <div class="py-4">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    @if(is_null($reservations))
                                        <h3 align="center">Вы ничего не забронировали</h3>
                                    @else
                                        <h1>Заявки на бронирование</h1>
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Имя
                                                </th>
                                                <th>
                                                    Телефон
                                                </th>
                                                <th>
                                                    Дата
                                                </th>
                                                <th>
                                                    Время
                                                </th>
                                                <th>
                                                    Пользователь
                                                </th>
                                                <th>
                                                    Статус
                                                </th>
                                                <th>
                                                    Действия
                                                </th>
                                            </tr>
{{--                                            @php(dd($reservations))--}}
                                            @php($i = 1)
                                            @foreach($reservations as $reservation)
                                                <tr>
                                                    <td>{{$i++ .')' }}</td>
                                                    <td>{{$reservation->name}}</td>
                                                    <td>{{$reservation->phone}}</td>
                                                    <td>{{$reservation->date}}</td>
                                                    <td>{{$reservation->times->name}}</td>
                                                    <td>{{$reservation->users->email}}</td>
                                                    <td>{{$reservation->sost->name}}</td>
                                                    <td><a href="{{ route('show', $reservation) }}"
                                                           class="btn btn-primary">Открыть</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
