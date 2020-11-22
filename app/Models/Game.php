<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;


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

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

//
//    public function time()
//    {
//        return $this->hasOne('App\Models\Time', 'id', 'time');
//    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type_game');
    }
//
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }


}
