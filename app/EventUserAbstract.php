<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUserAbstract extends Model
{
    protected $table = 'event_user_abstract';

    protected $fillable = [
        'title',
        'authors',
        'body',
        'submission_date',
        'delivery_preference',
    ];

    public const DELIVERY_PREFERENCE_POSTER = 1;
    public const DELIVERY_PREFERENCE_ORAL = 2;
    public const DELIVERY_PREFERENCE_EITHER = 3;

    public const DELIVERY_PREFERENCES = [
        self::DELIVERY_PREFERENCE_POSTER => 'Poster',
        self::DELIVERY_PREFERENCE_ORAL => 'Oral',
        self::DELIVERY_PREFERENCE_EITHER => 'Either',
    ];

    public function eventUser()
    {
        return $this->belongsTo('App\EventUser', 'event_user_id');
    }
}
