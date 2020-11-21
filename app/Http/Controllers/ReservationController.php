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

    public function reservation(Request $request)
    {
        $reservationId = session('reservationId');
        $reservation = Reservation::find($reservationId);
        $sost = $reservation->where([
            ['sost_id', 1],
            ['room_id', $request->room_id],
            ['date', $request->date],
            ['time', $request->time],
        ])->get();
        $sost_res = count($sost) == null;
        if ($sost_res !== null) {
            $times = Time::get();
        }
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


        $date = $request->date;
        $time = $request->time;
        $room = $request->room_id;
//        $sost = Reservation::where('sost_id' == 1)->get();
        $messages = array(
            'unique' => 'Комната уже забронирована на выбранную дату и время',
        );
//        dd($request->date, $request->time, $request->game_id, $request->room_id);


        $valid_date = Validator::make($request->all(), array(
            'date' => 'unique:reservations,date',
        ), $messages);
        $valid_time = Validator::make($request->all(), array(
            'time' => 'unique:reservations,time',
        ), $messages);
        $valid_room = Validator::make($request->all(), array(
            'room_id' => 'unique:reservations,room_id',
        ), $messages);

        $sost = $reservation->where([
            ['sost_id', 1],
            ['room_id', $request->room_id],
            ['date', $request->date],
            ['time', $request->time],
        ])->get();
        $sost_res = count($sost) == null;

//        dd($sost);
//        dd($sost_res == null);
//        dd($valid_date->fails() and $valid_time->fails() and $valid_room->fails() );
//        dd(($valid_date->fails() and $valid_time->fails() and $valid_room->fails()) and $sost_res == null);

        if ($valid_date->fails() and $valid_time->fails() and $valid_room->fails() and $sost_res == null) {
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
//        Уберает дублированные игры
        if ($reservation->games->contains($gameId)) {
            session()->flash('warning', 'Такая игра уже есть');
            //Не больше одной игры(Временная)
        } elseif ($reservation->games->count($gameId) >= 1) {
            session()->flash('warning', 'Больше одной игры');
        } else {
            $reservation->games()->attach($gameId);
        }

        if (Auth::check()) {
            $reservation->user_id = Auth::id();
            $reservation->save();
        }

//        $game = Game::find($gameId);

//        session()->flash('success', 'Добавлена игра ' . $game->name);

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
        $reservation->delete();


        $game = Game::find($gameId);
        session()->forget('reservationId');

        session()->flash('warning', 'Отменена бронирования игры  ' . $game->name);

        return redirect()->route('index');
    }

    public function reservationDrop(Reservation $reservation)
    {
        $reservation->sost_id = 2;
        $reservation->save();
        return redirect()->route('home')->with('warning', 'Бронь отменена');
    }
}
