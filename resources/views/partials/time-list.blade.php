<div class="col-md-12">
    @foreach($times as $time)
        @if($time->name)
            <button class="btn btn-outline-dark">
                {{$time->name}}
            </button>
        @endif
    @endforeach
</div>
