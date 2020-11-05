<?php

namespace App\Http\Middleware;

use App\Models\Reservation;
use Closure;
use Illuminate\Http\Request;

class ReservationIsNotEmpty
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
            if ($reservation->games->count() > 0) {
                return $next($request);
            }
        }

        session()->forget('reservationId');
        session()->flash('warning', 'Вы не выбрали игру для бронирования');
        return redirect()->route('index');
    }
}
