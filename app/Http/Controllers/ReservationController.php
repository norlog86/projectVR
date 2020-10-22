<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function reservation()
    {
        $orderId = session('ordersId');
        if (!is_null($orderId)) {
            $order = Reservation::findOrFail($orderId);
        }
        return view('reservation', compact('order'));

    }

    public function reservationOrder()
    {
        return view('order');
    }

    public function reservationAdd($gameId)
    {
        $orderId = session('ordersId');
        if (is_null($orderId)) {
            $order = Reservation::create();
            session(['ordersId' => $order->id]);
        } else {
            $order = Reservation::find($orderId);
        }
        $order->games()->attach($gameId);

        return view('reservation', compact('order'));
    }
}
