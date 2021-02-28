<?php

namespace App\Http\Controllers;

use App\GameRoom;
use App\Models\Game;
use App\Models\Game_room;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
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
        $games = DB::table('games')
            ->join('game_rooms', 'games.id', '=', 'game_rooms.game_id')
            ->where('game_rooms.room_id', $room->id)
            ->get();
        return view('room', compact('room', 'games'));
    }

    public function games()
    {
        $games = DB::table('games')
            ->join('game_rooms', 'games.id', '=', 'game_rooms.game_id')
            ->get();
        return view('games', compact('games'));
    }

    public function games_room($id)
    {
        $games = DB::table('games')
            ->join('game_rooms', 'games.id', '=', 'game_rooms.game_id')
            ->where('games.id', $id)

            ->get();
        return view('games_room', compact('games'));
    }

    public function game($id, $room)
    {
        $game = Game::where('id', $id)->first();
        $rooms = Game_room::where('game_id', $room)->first();

        return view('game', ['game' => $game, 'rooms' => $rooms]);
    }


    public function about()
    {
        return view('about');
    }
}
