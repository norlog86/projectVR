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
                                    <h1>Брони</h1>
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
{{--                                            <th>--}}
{{--                                                Статус--}}
{{--                                            </th>--}}
                                            <th>
                                                Действия
                                            </th>
                                        </tr>
                                        @foreach($reservations as $reservation)
                                            <tr>
                                                <td></td>
                                                <td>{{$reservation->name}}</td>
                                                <td>{{$reservation->phone}}</td>
                                                <td>{{$reservation->date}}</td>
                                                <td>{{$reservation->time}}</td>
{{--                                                <td>{{$reservation->sost_id}}</td>--}}
                                                <td>Открыть</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    {{--        </div>--}}


@endsection
