<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Reservation;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{

    public function reservation()
    {
        $times = Time::get();
        $reservationId = session('reservationId');
        if (!is_null($reservationId)) {
            $reservation = Reservation::findOrFail($reservationId);
        }
        return view('reservation', compact('reservation', 'times'));

    }

    public function reservationConfirm(Request $request)
    {
        $reservationId = session('reservationId');
        if (is_null($reservationId)) {
            return redirect()->route('index');
        }
        $reservation = Reservation::find($reservationId);

        $messages = array(
            'unique' => 'Игра уже забронирована на выбранную дату и время',
        );

        $valid_date = Validator::make($request->all(), array(
            'date' => 'unique:reservations,date',
        ), $messages);
        $valid_time = Validator::make($request->all(), array(
            'time' => 'unique:reservations,time',
        ), $messages);
        $valid_game = Validator::make($request->all(), array(
            'game_id' => 'unique:reservations,game_id',
        ), $messages);
        $valid_room = Validator::make($request->all(), array(
            'room_id' => 'unique:reservations,room_id',
        ), $messages);

        if ($valid_date->fails() and $valid_time->fails() and $valid_game->fails() and $valid_room->fails()) {
            return redirect()->back()->withErrors($valid_date->errors());
        } else {
            $success = $reservation->saveOrder($request->name, $request->phone, $request->date, $request->game_id,
                $request->players, $request->room_id, $request->price, $request->time, $request->text);
            if ($success) {
                session()->flash('success', 'Игра забронирована');
            } else {
                session()->flash('warning', 'Случилась ошибка');
            }
        }
        return redirect()->route('index');
    }


    public function reservationPlace()
    {
        $reservationId = session('reservationId');
        if (is_null($reservationId)) {
            return redirect()->route('index');
        }
        $reservation = Reservation::find($reservationId);
        return view('reservation', compact('reservation'));
    }

    public function reservationAdd($gameId)
    {
        $reservationId = session('reservationId');
//        dd($reservationId);
        if (is_null($reservationId)) {
            $reservation = Reservation::create();
            session(['reservationId' => $reservation->id]);
        } else {
            $reservation = Reservation::find($reservationId);
        }
        if ($reservation->games->contains($gameId)) {
            session()->flash('Такая уже есть');
        } else {
            $reservation->games()->attach($gameId);
        }

        if (Auth::check()) {
            $reservation->user_id = Auth::id();
            $reservation->save();
        }

        $game = Game::find($gameId);

        session()->flash('success', 'Добавлена игра ' . $game->name);

        return redirect()->route('reservation');
    }

    public function reservationRemove($gameId)
    {
        $reservationId = session('reservationId');
        if (is_null($reservationId)) {
            return redirect()->route('reservation');
        }
        $reservation = Reservation::find($reservationId);
        $reservation->games()->detach($gameId);


        $game = Game::find($gameId);

        session()->flash('warning', 'Удалена игра  ' . $game->name);

        return redirect()->route('reservation');
    }

    public function reservationDrop()
    {
        $reservationId = session('reservationId');
        if (is_null($reservationId)) {
            return redirect()->route('index');
        }
        $reservation = Reservation::find($reservationId);
        $success = $reservation->dropOrder();
        if ($success) {
            session()->flash('success', 'Бронирование отменено');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }
        return redirect()->route('home');
    }
}
