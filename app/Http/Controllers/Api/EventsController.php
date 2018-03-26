<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Resources\EventResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{

    public function index()
    {
        return EventResource::collection(Auth::user()->events);
    }

    public function show(Event $event)
    {
        return new EventResource($event);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'event' => 'required|min:5',
            'date' => 'required|date_format:d/m/Y|after:yesterday',
            'time' => 'required'
        ], [
            'required' => ':attribute is required',
            'min' => ':attribute field must have at least :min characters',
            'after' => 'Date must be today or before.',
        ]);

        $event = new Event();
        $event->name = $request->event;
        $event->description = is_null($request->description) ? '' : $request->description;;
        $event->date = Carbon::createFromFormat('d/m/Y H:i', "{$request->date} $request->time");
        $event->active = true;
        Auth::user()->events()->save($event);

        return $event;
    }

    public function edit(Request $request, Event $event)
    {
        $fields = [];

        if ($request->has('event')) {
            $fields['name'] = $request->event;
        }

        if ($request->has('description')) {
            $fields['description'] = is_null($request->description) ? '' : $request->description;
        }

        if ($request->has('date')) {
            $fields['date'] = Carbon::createFromFormat('d/m/Y H:i', "{$request->date} $request->time");
        }

        if ($request->ajax()) {
            $fields['active'] = filter_var($request->active, FILTER_VALIDATE_BOOLEAN);
        }
        else {
            $fields['active'] = !empty($request->active) ? TRUE : FALSE;
        }

        $event->update($fields);
        return new EventResource($event);;
    }

    public function delete(Event $event)
    {

        if (Auth::user()->email && $event->user->email) {
            $event->delete();
            return true;
        }

        return false;
    }
}
