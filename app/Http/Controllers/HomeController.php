<?php

namespace App\Http\Controllers;

use App\Event;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('home', ['events' => $events]);
    }
}
