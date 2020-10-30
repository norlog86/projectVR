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

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->games as $game) {
            $sum += $game->getPrice();
        }
        return $sum;
    }

    public function saveOrder($name, $phone, $text)
    {
        if ($this->sost_id == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->date = '2020.12.12';
            $this->game_id = 1;
            $this->players = 1;
            $this->room_id = 1;
            $this->price = 1;
            $this->time_id = 1;
            $this->text = $text;
            $this->user_id = 1;
            $this->sost_id = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }

    }
}
