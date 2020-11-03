<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Reservation;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function reservation()
    {
        $times = Time::get();
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Reservation::findOrFail($orderId);
        }
        return view('reservation', compact('order', 'times'));

    }

    public function reservationConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Reservation::find($orderId);
//        dd($request->all());
        $success = $order->saveOrder($request->name, $request->phone, $request->date, $request->game_id,
            $request->players, $request->room_id, $request->price, $request->time, $request->text);

        if ($success) {
            session()->flash('success', 'Игра забронирована');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }
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
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Reservation::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Reservation::find($orderId);
        }
//        if ($orderer->games->contains($gameId)) {
//        } else {
//        }
        $order->games()->attach($gameId);

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $game = Game::find($gameId);

        session()->flash('success', 'Добавлена игра ' . $game->name);

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
