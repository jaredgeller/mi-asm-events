<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventUser;
use App\EventUserAbstract;
use Illuminate\Http\Request;

class EventUserAbstractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\EventUserAbstract  $eventUserAbstract
     * @return \Illuminate\Http\Response
     */
    public function show(EventUserAbstract $eventUserAbstract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event $event
     * @param  \App\EventUser $eventUser
     * @param  \App\EventUserAbstract  $eventUserAbstract
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, EventUser $eventUser, EventUserAbstract $eventUserAbstract)
    {
        return view('event_user_abstract.edit', [
            'event' => $event,
            'eventUser' => $eventUser,
            'eventUserAbstract' => $eventUserAbstract,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event $event
     * @param  \App\EventUser $eventUser
     * @param  \App\EventUserAbstract  $eventUserAbstract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, EventUser $eventUser, EventUserAbstract $eventUserAbstract)
    {
        $rules = [
            'title' => 'required|max:100',
            'authors' => 'required|max:200',
            'body' => 'required|max:3000',
            'submission_date' => 'required|date_format:Y-m-d',
            'delivery_preference' => 'required',
        ];
        $messages = [
            'submission_date.date_format' => 'The :attribute does not match the format yyyy-mm-dd',
        ];
        $request->validate($rules, $messages);

        $eventUserAbstract->title = $request->input('title');
        $eventUserAbstract->authors = $request->input('authors');
        $eventUserAbstract->body = $request->input('body');
        $eventUserAbstract->submission_date = $request->input('submission_date');
        $eventUserAbstract->delivery_preference = $request->input('delivery_preference');

        $eventUserAbstract->save();

        return redirect()->route('events.event_user.index', [$event->id, $eventUser->id])->with('status', 'Abstract updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventUserAbstract  $eventUserAbstract
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventUserAbstract $eventUserAbstract)
    {
        //
    }
}
