<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable = [
        'registration_date',
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
