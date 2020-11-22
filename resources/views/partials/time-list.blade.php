<div class="col-md-12">
    @foreach($times as $time)
            @if($time->name)
                <button class="btn btn-outline-dark"
                    @foreach($reservations as $reservation)
                        @if($reservation->timeReserv->name===$time->name)
                            disabled
                        @endif
                    @endforeach>
                    {{$time->name}}
                </button>
            @endif
    @endforeach
</div>
