<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

//    public function sost()
//    {
//        return $this->belongsToMany(Sost_reserv::class);
//    }
}
