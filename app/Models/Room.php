<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
