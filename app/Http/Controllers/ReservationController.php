<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function reservation($id, $reservation = null)
    {
        $reservation = Game::where('id', $id)->first();
        return view('reservation', ['reservation' => $reservation]);
    }

    public function reservations()
    {
        $reservationId = session('reservationId');
        if (!is_null($reservationId)) {
            $reservation = Reservation::findOrFail($reservationId);
        }
        return view('reservation', compact('reservation'));

    }

    public function reservationAdd($gameId)
    {
        $reservationId = session('reservationId');
        if (is_null($reservationId)) {
            $reservation = Reservation::create();
            session(['reservationId' => $reservation->id]);
        } else {
            $reservation = Reservation::find($reservationId);
        }
        $reservation->games()->attach($gameId);

        return view('reservation', compact('reservation'));
    }
}
