<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {

        $request->validate(
            [
                'user_id' => 'required|integer',
                'event_name' => 'required|string',
                'event_start_date' => 'required',
                'event_end_date' => 'required',
            ]
        );

        $event = new Event();
        $event->create(
            $request->all()
        );

        return [
            'success' => true,
            'data' => $request->all(),
        ];
    }

    public function getUserEvents(Request $request){

        $events = Event::where('user_id', $request->id)->get();
        return $events;
    }
}
