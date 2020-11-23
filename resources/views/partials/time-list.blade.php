@foreach($rooms as $room)
    <div class="col-md-12">
        <h3>{{$room->name}}</h3>
    </div>
    <div class="col-md-12">
        <div class="row">
            @foreach($times as $time)
                @if($time->name)
                    <div class="col-md-2 col-sm-4 my-4">
                        <a class="btn btn-outline-dark btn-time" data-room="{{$room->id}}" data-time="{{$time->id}}"
                                @foreach($room->reservations()->where("date", $reserv_date)->get() as $reservation)
                                @if($reservation->time===$time->id && $reservation->room_id===$room->id)
                                disabled
                            @endif
                            @endforeach>
                            {{$time->name}}
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endforeach
