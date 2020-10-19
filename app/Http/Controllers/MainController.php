<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MainController extends Controller
{
    public function index()
    {
        $games =  Game::get();
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
        $games =  Game::where('room_id', $room->id)->get();
        return view('room', compact('room', 'games'));
    }

    public function games()
    {
        $games = Game::get();
        return view('games', compact('games'));
    }

    public function game($room, $game = null, $id)
    {
        $game = Game::where('id', $id)->get();
        return view('game', ['game' => $game]);
    }

    public function about()
    {
        return view('about');
    }

    public function reservation()
    {
        return view('reservation');
    }
}
