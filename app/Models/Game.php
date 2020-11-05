<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель "Игра"
 */
class Game extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->hasOne('App\Models\Type_game', 'id', 'type_game_id');
    }

    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }

    public function games()
    {
        return $this->belongsTo(Game::class);
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }

    public function times()
    {
        return $this->belongsTo(Time::class);
    }

    public function time()
    {
        return $this->hasOne('App\Models\Time', 'id', 'time');
    }

    public function getPrice()
    {
        return $this->price;
    }
}
