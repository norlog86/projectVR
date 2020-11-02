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
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Reservation::findOrFail($orderId);
            if ($order->games->count() === 0) {
                session()->flash('warning', 'Вы не выбрали игру для бронирования');
                return redirect()->route('index');
            }
        }
        return $next($request);
    }
}
