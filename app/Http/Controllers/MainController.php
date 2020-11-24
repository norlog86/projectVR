<?php

namespace App\Http\Controllers;

use App\GameRoom;
use App\Models\Game;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        /*
        $games = DB::table('games')
            ->join('game_rooms', 'games.id', '=', 'game_rooms.game_id')
            ->get();*/
        $games = Game::all();
        $rooms = Room::get();

        return view('index', compact('games', 'rooms'));
    }

    public function rooms()
    {
        $rooms = Room::get();
        return view('rooms', compact('rooms'));
    }

    public function room($path)
    {
        $room = Room::where('path', $path)->first();
        $game = GameRoom::where('room_id', $room->id)->get();
        $games = DB::table('games')
            ->join('game_rooms', 'games.id', '=', 'game_rooms.game_id')
            ->where('game_rooms.room_id', $room->id)
            ->get();
        return view('room', compact('room', 'game', 'games'));
    }

    public function games()
    {
        $games = DB::table('games')
            ->join('game_rooms', 'games.id', '=', 'game_rooms.game_id')
            ->get();
        return view('games', compact('games'));
    }

    public function game($id, $room, $game = null)
    {
        $game = Game::where('id', $id)->first();

        return view('game', ['game' => $game]);
    }


    public function about()
    {
        return view('about');
    }
}
