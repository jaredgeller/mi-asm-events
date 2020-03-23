<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventUser;
use App\EventUserAbstract;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        return view('home', [
            'events' => Event::all(),
        ]);
    }

    /**
     * Create registration
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function registerGet(Event $event)
    {
        $eventUser = new EventUser();
        $eventUser->event_id = $event->id;
        $eventUser->user_id = Auth::user()->id;
        $eventUser->registration_date = Carbon::create();
        $eventUser->save();

        return redirect()->route('home')->with('status', 'Event registration submitted!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\EventUser $eventUser
     * @return \Illuminate\Http\Response
     */
    public function abstractGet(EventUser $eventUser)
    {
        return view('abstract', [
            'eventUser' => $eventUser,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventUser $eventUser
     * @return \Illuminate\Http\Response
     */
    public function abstractPost(Request $request, EventUser $eventUser)
    {
        $eventUserAbstract = new EventUserAbstract();
        $eventUserAbstract->event_user_id = $eventUser->id;
        $eventUserAbstract->title = $request->input('title');
        $eventUserAbstract->authors = $request->input('authors');
        $eventUserAbstract->body = $request->input('body');
        $eventUserAbstract->submission_date = Carbon::create();
        $eventUserAbstract->delivery_preference = $request->input('delivery_preference');

        $eventUserAbstract->save();

        return redirect()->route('home')->with('status', 'Abstract submitted!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\EventUserAbstract $eventUserAbstract
     * @return \Illuminate\Http\Response
     */
    public function abstractView(EventUserAbstract $eventUserAbstract)
    {
        return view('abstract_view', [
            'eventUserAbstract' => $eventUserAbstract,
        ]);
    }

    /**
     * Create registration
     *
     * @return \Illuminate\Http\Response
     */
    public function membershipGet()
    {
        $user = Auth::user();

        $user->mi_member_date = Carbon::create();
        $user->save();

        return redirect()->route('home')->with('status', 'Membership request submitted!');
    }
}
