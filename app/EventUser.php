<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $table = 'event_user';

    protected $fillable = [
        'registration_date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function abstracts()
    {
        return $this->hasMany('App\EventUserAbstract')->get();
    }
}
