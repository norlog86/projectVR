<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

//    public function getRoom()
//    {
//        return Room::find($this->room_id);
//    }

    public function games()
    {
        return $this->belongsTo(Game::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
