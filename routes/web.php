<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'events' => \App\Event::all(),
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events/{event}/register', 'HomeController@registerGet')->name('registerGet');
Route::get('/registration/{event_user}/abstract', 'HomeController@abstractGet')->name('abstractGet');
Route::get('/registration/{event_user}/abstract/{event_user_abstract}', 'HomeController@abstractView')->name('abstractView');
Route::post('/registration/{event_user}/abstract', 'HomeController@abstractPost')->name('abstractPost');
Route::get('/membership', 'HomeController@membershipGet')->name('membershipGet');

Route::resource('users', 'UserController');
Route::resource('events', 'EventController');
Route::resource('events.event_user', 'EventUserController');
Route::resource('events.event_user.event_user_abstract', 'EventUserAbstractController');
