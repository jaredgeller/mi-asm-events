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
        return $this->hasOne('App\User');
    }
}
