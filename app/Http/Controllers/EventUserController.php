<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventUser;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        return view('event_user.index', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function show(EventUser $eventUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event $event
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, EventUser $eventUser)
    {
        return view('event_user.edit', [
            'event' => $event,
            'eventUser' => $eventUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event $event
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, EventUser $eventUser)
    {
        $rules = [
            'registration_date' => 'required|date_format:Y-m-d',
        ];
        $messages = [
            'registration_date.date_format' => 'The :attribute does not match the format yyyy-mm-dd',
        ];
        $request->validate($rules, $messages);

        $eventUser->registration_date = $request->input('registration_date');

        $eventUser->save();

        return redirect()->route('events.event_user.index', [$event->id, $eventUser->id])->with('status', 'Registration updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventUser $eventUser)
    {
        //
    }
}
