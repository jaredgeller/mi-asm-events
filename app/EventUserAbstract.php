<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUserAbstract extends Model
{
    protected $fillable = [
        'title',
        'authors',
        'body',
        'submission_date',
        'delivery_preference',
    ];
}
