<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'event' => 'required|min:5',
            'date' => 'required',
        ], [
            'required' => 'Please fill in the :attribute',
            'min' => ':attribute field must have at least :min characters',
        ]);

        $event = new Event();
        $event->name = $request->event;
        $event->description = $request->description;
        $event->date = (new Carbon($request->date))->timestamp;
        $event->active = TRUE;
        $event->save();

        return back();
    }

    public function get(Request $request, Task $task)
    {
        return $task;
    }

    public function edit(Request $request, Event $task)
    {
        $fields = [];

        if ($request->has('event')) {
            $fields['name'] = $request->event;
        }

        if ($request->has('description')) {
            $fields['description'] = $request->description;
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

    public function delete(Request $request, Event $event)
    {
        // May improve this.
        $event->delete();
        return ["status" => TRUE];
    }
}
