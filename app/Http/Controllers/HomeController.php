<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckIsAdmin;
use App\Models\Reservation;
use App\Models\User;

class HomeController extends Controller
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

//    public function room()
//    {
//        return $this->hasOne('App\Models\Room', 'id', 'room_id');
//    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (CheckIsAdmin::class) {
            $reservations = Reservation::get();
        } else {
            $reservations = Reservation::where('sost_id', 1)->get();
        }
        return view('home', compact('reservations'));
    }
}