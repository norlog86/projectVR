<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_game extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'game_id',
        'reservation_id',
        'quantity',
        'time',
        'date',
        'created_at',
        'updated_at',
    ];
}
