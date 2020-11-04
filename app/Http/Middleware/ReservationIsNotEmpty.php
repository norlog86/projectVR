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
            $order = Reservation::findOrFail($reservationId);
            if ($order->games->count() == 0) {
                session()->flash('warning', 'Вы не выбрали игру для бронирования');
                return redirect()->route('index');
            }
        }
        return $next($request);
    }
}
