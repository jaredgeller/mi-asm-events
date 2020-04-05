<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::all(),
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'address_street_1' => 'max:200',
            'address_street_2' => 'max:200',
            'address_city' => 'max:200',
            'address_state' => 'max:20',
            'address_zip' => 'max:10',
            'mi_member_date' => 'date_format:Y-m-d',
        ];
        $messages = [
            'mi_member_date.date_format' => 'The :attribute does not match the format yyyy-mm-dd',
        ];
        $request->validate($rules, $messages);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->address_street_1 = $request->input('address_street_1');
        $user->address_street_2 = $request->input('address_street_2');
        $user->address_city = $request->input('address_city');
        $user->address_state = $request->input('address_state');
        $user->address_zip = $request->input('address_zip');
        $user->administrator_ind = $request->input('administrator_ind');
        $user->mi_member_date = $request->input('mi_member_date');

        $user->save();

        return redirect()->route('users.index')->with('status', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
