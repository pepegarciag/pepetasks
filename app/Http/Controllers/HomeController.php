<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "<pre>";var_dump(Telegram::getUpdates());echo "</pre>";
        $tasks = Task::all();
        return view('home', ['tasks' => $tasks]);
    }
}
