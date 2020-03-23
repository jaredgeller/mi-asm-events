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
        $eventUser->registration_date = Carbon::today();
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
        $eventUserAbstract->submission_date = Carbon::today();
        $eventUserAbstract->delivery_preference = $request->input('delivery_preference');

        $eventUserAbstract->save();

        return redirect()->route('home')->with('status', 'Abstract submitted!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\EventUser $eventUser
     * @param  \App\EventUserAbstract $eventUserAbstract
     * @return \Illuminate\Http\Response
     */
    public function abstractView(EventUser $eventUser, EventUserAbstract $eventUserAbstract)
    {
        return view('abstract_view', [
            'eventUser' => $eventUser,
            'eventUserAbstract' => $eventUserAbstract,
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function membershipGet()
    {
        $user = Auth::user();

        $user->mi_member_date = Carbon::today();
        $user->save();

        return redirect()->route('home')->with('status', 'Membership request submitted!');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function profileGet()
    {
        return view('profile', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profilePut(Request $request)
    {
        $user = Auth::user();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->address_street_1 = $request->input('address_street_1');
        $user->address_street_2 = $request->input('address_street_2');
        $user->address_city = $request->input('address_city');
        $user->address_state = $request->input('address_state');
        $user->address_zip = $request->input('address_zip');

        $user->save();

        return redirect()->route('home')->with('status', 'Profile updated!');
    }
}
