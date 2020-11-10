<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::id() == 1 || Auth::id() == 3) {
            session()->flash('success', 'Добавь в строку сайта /admin чтобы открыть панель администратора. Кабинет доступен только пользователю!');
            return redirect(route('index'));
        }
        if (Auth::check()) {
            $reservations = Reservation::where('user_id', Auth::id())->get();
        } else {
            return redirect(route('index'));
        }
        return view('home', compact('reservations'));
    }

    public function show($id, $reservation = null)
    {
        $reservation = Reservation::where('id', $id)->first();
        return view('show', ['reservation' => $reservation]);
    }

//    public function show(Reservation $reservation)
//    {
//        return view('show', compact('reservation'));
//    }

}

