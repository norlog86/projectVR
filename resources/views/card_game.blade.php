<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>
        <img src="{{$game->img}}" alt="{{$game->name}}">
        <div class="caption">
            <h3>{{$game->name}}</h3>
            <p>{{$game->price}} руб.</p>
            <p>
            <form action="{{$game->id}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">Бронировать</button>
                {{--                <a href="{{route('game', compact('id'))}}"--}}
                <a href="{{route('game', $game->id)}}"
                   class="btn btn-default"
                   role="button">Подробнее</a>
                <input type="hidden" name="_token" value="lFTktAclmqdU6ecZPUMPMxVBI7s9fsZei9mEvl4u"></form>
            </p>
        </div>
    </div>
</div>