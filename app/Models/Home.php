<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }
}
