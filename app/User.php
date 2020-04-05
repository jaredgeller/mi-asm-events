<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address_street_1',
        'address_street_2',
        'address_city',
        'address_state',
        'address_zip',
        'administrator_ind',
        'mi_member_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function eventUser(int $event_id)
    {
        return EventUser::where('event_id', $event_id)->where('user_id', $this->id)->first();
    }

    public function isRegisteredForEvent(int $event_id): bool
    {
        return $this->eventUser($event_id) !== null;
    }

    public function abstracts(int $event_id)
    {
        if ($this->eventUser($event_id)) {
            return EventUserAbstract::where('event_user_id', $this->eventUser($event_id)->id)->get();
        }

        return null;
    }
}
