<div class="col-sm-6 col-md-4">
    <a href="{{route('game', ['id'=>$game->game_id, 'room'=>$game->room_id])}}" class="game-thumbnail">
{{--                @dd(route('game', [$game->game_id, 'room', $game->room_id]))--}}
        <div class="labels">
        </div>
        <div class="game-img-container">
            <img src="{{Storage::url($game->img)}}" alt="{{$game->name}}">
        </div>
        <div class="game-name">
            <h3>{{$game->name}}</h3>
            <h4>{{$game->room_id}}</h4>
        </div>
    </a>
</div>
