<?php

namespace App\Http\Middleware;

use App\Models\Reservation;
use Closure;
use Illuminate\Http\Request;

class ReservationMoreOne
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $reservationId = session('reservationId');

        if (!is_null($reservationId)) {
            $reservation = Reservation::findOrFail($reservationId);
            if ($reservation->games->count() == 1) {
                return $next($request);
            }
        }
        $res = session('reservationId');
//        dd($reservationId);
        if (!is_null($res)) {
            session()->forget('reservationId');
        } else {
            session()->pull('reservationId');
        }

        session()->flash('warning', 'Выбрано больше одной игры бронирование сброшено');
//        session()->flush();
//        return redirect()->route('reservation');
        return back();
    }
}
