<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game_room extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }


}
