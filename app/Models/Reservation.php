<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->belongsToMany(Game::class)->withTimestamps();
    }

   public function gaming()
   {
       return $this->hasOne('App\Models\Game', 'id', 'game_id');
   }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function time()
    {
        return $this->belongsToMany(Time::class);
    }

    public function sost()
    {
        return $this->hasOne('App\Models\Sost_reserv', 'id', 'sost_id');
    }

    public function times()
    {
        return $this->hasOne('App\Models\Time', 'id', 'time');
    }

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
//    public function getFullPrice()
//    {
//        $sum = 0;
//        foreach ($this->games as $game) {
//            $sum += $game->getPrice();
//        }
//        return $sum;
//    }

    public function saveOrder($name, $phone, $date, $game_id, $players, $room_id, $price, $time, $text)
    {
        if ($this->sost_id == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->date = $date;
            $this->game_id = $game_id;
            $this->players = $players;
            $this->room_id = $room_id;
            $this->price = $price;
            $this->time = $time;
            $this->text = $text;
            $this->sost_id = 1;
            $this->save();
            session()->forget('reservationId');
            return true;
        } else {
            return false;
        }
    }

    public function dropOrder()
    {
        if ($this->sost_id == 1) {
            $this->sost_id = 2;
            $this->save();
//            session()->forget('reservationId');
            return true;
        } else {
            return false;
        }
    }
}
