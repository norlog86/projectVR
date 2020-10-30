<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Reservation;
use App\Models\Time;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function reservation()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Reservation::findOrFail($orderId);
        }
        return view('reservation', compact('order'));

    }

    public function reservationConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Reservation::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone, $request->text);

        if ($success) {
            session()->flash('success', 'Игра забронирована');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }

        Reservation::eraseOrderSum();

        return redirect()->route('index');
    }

    public function reservationPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Reservation::find($orderId);
        return view('order', compact('order'));
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
        if ($order->games->contains($gameId)) {
            $errors = 'Такая игра уже добавлена';
        } else {
            $order->games()->attach($gameId);
        }
        $game = Game::find($gameId);

        Reservation::changeFullSum($game->name);

//        if ($order->times()->contains($timeId)) {
//            $errors = 'Такое время уже выбранно';
//        } else {
//            $order->times()->attach($timeId);
//        }
//        $time = Time::find($timeId);

        session()->flash('success', 'Добавлена игра ' . $game->name );

        return redirect()->route('reservation');
    }

    public function reservationRemove($gameId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('reservation');
        }
        $order = Reservation::find($orderId);
        $order->games()->detach($gameId);

        $game = Game::find($gameId);

        session()->flash('warning', 'Удалена игра  ' . $game->name);

        return redirect()->route('reservation');
    }
}
