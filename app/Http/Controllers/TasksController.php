<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Auth;


class TasksController extends Controller
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
    public function add(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|min:5',
            'schedule' => 'required',
        ], [
            'required' => 'Please fill in the :attribute',
            'min' => ':attribute field must have at least :min characters',
        ]);

        $task = new Task();
        $task->user_id = Auth::id();
        $task->name = $request->task;
        $task->schedule = $request->schedule;
        $task->active = TRUE;
        $task->save();

        return back();
    }

    public function get(Request $request, Task $task)
    {
        return $task;
    }

    public function edit(Request $request, Task $task)
    {
        $fields = [];

        if ($request->has('task')) {
            $fields['name'] = $request->task;
        }

        if ($request->has('schedule')) {
            $fields['schedule'] = $request->schedule;
        }

        if ($request->ajax()) {
            $fields['active'] = filter_var($request->active, FILTER_VALIDATE_BOOLEAN);
        }
        else {
            $fields['active'] = !empty($request->active) ? TRUE : FALSE;
        }

        $task->update($fields);

        return $request->ajax() ? $task : back();
    }

    public function delete(Request $request, Task $task)
    {
        // May improve this.
        $task->delete();
        return ["status" => TRUE];
    }
}
