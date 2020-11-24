<div class="col-sm-6 col-md-4">
    <a href="{{route('game', $game->id)}}" class="game-thumbnail">
        <div class="labels">
        </div>
        <div class="game-img-container">
            <img src="{{Storage::url($game->img)}}" alt="{{$game->name}}">
        </div>
        <div class="game-name">
            <h3>{{$game->name}}</h3>
        </div>
    </a>
</div>
