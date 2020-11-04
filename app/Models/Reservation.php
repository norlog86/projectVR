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

    public function times()
    {
        return $this->belongsToMany(Time::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->games as $game) {
            $sum += $game->getPrice();
        }
        return $sum;
    }

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
}
