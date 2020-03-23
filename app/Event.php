<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'event_date',
        'description',
    ];

    public function registrations()
    {
        return $this->hasMany('App\EventUser');
    }
}
